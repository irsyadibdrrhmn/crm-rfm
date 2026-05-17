<?php
namespace App\Http\Controllers;
use App\Models\{Pelanggan,RfmResult,Transaksi};
use Carbon\Carbon;
use Illuminate\Http\Request;

class RfmController extends Controller{
 public function index(Request $r){ $q=RfmResult::with('pelanggan'); if($r->segmentasi) $q->where('segmentasi',$r->segmentasi); if($r->search) $q->whereHas('pelanggan',fn($x)=>$x->where('nama','like',"%{$r->search}%")); $data=$q->paginate(15); $segments=RfmResult::distinct()->pluck('segmentasi'); return view('rfm.index',compact('data','segments')); }
 public function process(){ $rows=[]; foreach(Pelanggan::all() as $p){ $tr=Transaksi::where('pelanggan_id',$p->id); $last=$tr->max('tanggal_transaksi'); $rows[]=['pelanggan_id'=>$p->id,'recency'=>$last?Carbon::parse($last)->diffInDays(now()):9999,'frequency'=>$tr->count(),'monetary'=>$tr->sum('total')]; }
 $rScores=$this->score(collect($rows)->pluck('recency'), true); $fScores=$this->score(collect($rows)->pluck('frequency')); $mScores=$this->score(collect($rows)->pluck('monetary')); RfmResult::truncate(); foreach($rows as $i=>$row){$rs=$rScores[$i];$fs=$fScores[$i];$ms=$mScores[$i]; RfmResult::create($row+['r_score'=>$rs,'f_score'=>$fs,'m_score'=>$ms,'rfm_score'=>"$rs$fs$ms",'segmentasi'=>$this->segment($rs,$fs,$ms)]);} return back()->with('ok','Analisis RFM selesai'); }
 private function score($vals,$invert=false){ $sorted=$vals->sort()->values(); $n=max(1,$sorted->count()); $scores=[]; foreach($vals as $v){ $rank=$sorted->search($v)+1; $s=(int)ceil($rank/$n*5); $scores[]=$invert?6-$s:$s; } return $scores; }
 private function segment($r,$f,$m){ return match(true){$r>=4&&$f>=4&&$m>=4=>'Champion',$f>=4&&$m>=3=>'Loyal Customer',$r>=4&&$f>=3=>'Potential Loyalist',$r>=4&&$f<=2=>'New Customer',$r<=2&&$f>=3=>'At Risk',$r<=2&&$f<=2=>'Lost Customer',default=>'Regular Customer'}; }
}

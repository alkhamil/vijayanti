<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuisioner extends Model
{
    public function criteria(){
        return $this->belongsTo(Criteria::class, 'criteria_id');
    }

    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function getKriteria($id, $type)
    {
        if($type == 'all'){
            $k =  Kuisioner::where('company_id', $id)->get();
            $c =  Criteria::all();
        }
        if($type == 'periode'){
            $k =  Kuisioner::where('assignment_code', $id)->get();
            $c =  Criteria::all();
        }
        
        if(count($k)){
            foreach($k as $data)
            {
                $hasil['saran'][$data->criteria_id] = $data->saran;
                $hasil['kenyataan'][$data->criteria_id][] = $data->kenyataan;
                $hasil['harapan'][$data->criteria_id][] =  $data->harapan;
            }

        }else{
            foreach($c as $data)
            {
                $hasil['saran'][$data->id][] = null;
                $hasil['kenyataan'][$data->id][] = 0;
                $hasil['harapan'][$data->id][] =  0;
            }
        }
        return $hasil;
    }

    public function servqual($id, $type)
    {
        $data = $this->getKriteria($id, $type);
        
        foreach($data['kenyataan'] as $key => $db)
        {
            $hasil['bobotkenyataan'][$key] = array_sum($data['kenyataan'][$key]);
            $hasil['ratakenyataan'][$key] = number_format(array_sum($data['kenyataan'][$key]) / count($data['kenyataan'][$key]), 1);
            $hasil['bobotharapan'][$key] = array_sum($data['harapan'][$key]);
            $hasil['rataharapan'][$key] = number_format(array_sum($data['harapan'][$key]) / count($data['harapan'][$key]), 1);
            $hasil['saran'][$key] = $data['saran'][$key];
        }   
        return $hasil;
    }

    public function dimensiNilai($id, $type)
    {   
        $kriteria = $this->servqual($id, $type);
        $dimensi = Dimension::with(['criteria'])->get();

        foreach($dimensi as $data)
        {   
            $bobotK = 0;
            $bobotH = 0;
            $rataK = 0;
            $rataH = 0;
            foreach($data->criteria as $dt)
            {
                $rataK += $kriteria['ratakenyataan'][$dt->id]; 
                $rataH += $kriteria['rataharapan'][$dt->id]; 

                $hasil['bobotkenyataan'][$data->id] = $rataK;   
                $hasil['ratakenyataan'][$data->id] = number_format($rataK/ count($data->criteria), 1);   
                $hasil['bobotharapan'][$data->id] = $rataH;   
                $hasil['rataharapan'][$data->id] = number_format($rataH/ count($data->criteria), 1);   
            }
        }

        return $hasil;
    }

    public function keterangan($a)
    {
        if($a < 0){
            $ket = 'Kurang Baik';
        }
        if($a == 0){
            $ket = 'Baik';
        }
        if($a > 0){
            $ket = 'Sangat Baik';
        }

        return $ket;
    }
}

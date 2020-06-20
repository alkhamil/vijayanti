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

    public function getKriteria($company_id)
    {
        $k =  Kuisioner::where('company_id', $company_id)->get();
        $c =  Criteria::all();
        
        if(count($k)){
            foreach($k as $data)
            {
                $hasil['kenyataan'][$data->criteria_id][] = $data->kenyataan;
                $hasil['harapan'][$data->criteria_id][] =  $data->harapan;
            }

        }else{
            foreach($c as $data)
            {
                $hasil['kenyataan'][$data->id][] = 0;
                $hasil['harapan'][$data->id][] =  0;
            }
        }

        return $hasil;
    }

    public function servqual($id)
    {
        $data = $this->getKriteria($id);
        
        foreach($data['kenyataan'] as $key => $db)
        {
            $hasil['bobotkenyataan'][$key] = array_sum($data['kenyataan'][$key]);
            $hasil['ratakenyataan'][$key] = array_sum($data['kenyataan'][$key]) / count($data['kenyataan'][$key]);
            $hasil['bobotharapan'][$key] = array_sum($data['harapan'][$key]);
            $hasil['rataharapan'][$key] = array_sum($data['harapan'][$key]) / count($data['harapan'][$key]);
        }   

        return $hasil;
    }

    public function dimensiNilai()
    {   
        $kriteria = $this->servqual();
        $dimensi = Dimension::with(['criteria'])->get();

        foreach($dimensi as $data)
        {   
            $bobotK = 0;
            $bobotH = 0;
            $rataK = 0;
            $rataH = 0;
            foreach($data->criteria as $dt)
            {
                $bobotK += $kriteria['bobotkenyataan'][$dt->id]; 
                $rataK += $kriteria['ratakenyataan'][$dt->id]; 
                $bobotH += $kriteria['bobotharapan'][$dt->id]; 
                $rataH += $kriteria['rataharapan'][$dt->id]; 

                $hasil['bobotkenyataan'][$data->id] = $bobotK;   
                $hasil['ratakenyataan'][$data->id] = $rataK;   
                $hasil['bobotharapan'][$data->id] = $bobotH;   
                $hasil['rataharapan'][$data->id] = $rataH;   
            }
        }

        return $hasil;
    }
}

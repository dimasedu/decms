<?php

class Fungsiku{
	

	function ceknama($table, $field, $str){
    	$CI =& get_instance();
    	
    	$CI->db->where($field, $str);
    	$query = $CI->db->get($table);

    	return $query->num_rows();
    }

    

    /***
   *
   * Fungsi untuk menampilkan Tanggal, Bulan simple dan kumplit
   *
   *
   * **/

    public function hari_ini()
    {
        $w = date('w');

        switch ($w) {
            case '1':
                $hari = 'Senin';
                break;
            case '2':
                $hari = 'Selasa';
                break;
            case '3':
                $hari = 'Rabu';
                break;      
            case '4':
                $hari = 'Kamis';
                break;
            case '5':
                $hari = 'Jumat';
                break;
            case '6':
                $hari = 'Sabtu';
                break;             
            
            default:
                $hari = "Minggu";
                break;
        }
        
        return $hari;
    }
   
   public function bulan_simple($param)
        {
        
        $bulan = array(
        '01'=>'Jan',
        '02'=>'Feb',
        '03'=>'Mar',
        '04'=>'Apr',
        '05'=>'Mei',
        '06'=>'Jun',
        '07'=>'Jul',
        '08'=>'Aug',
        '09'=>'Sep',
        '10'=>'Okt',
        '11'=>'Nop',
        '12'=>'Des',
        );
        
        $show = $bulan[$param];
        
        return $show;
        
        }
        
        public function bulan_full($param)
        {

            if($param <=9){
                $paramx = "0".$param;
            }else{
                $paramx = $param;
            }
        
        $bulan = array(
        '01'=>'Januari',
        '02'=>'Februari',
        '03'=>'Maret',
        '04'=>'April',
        '05'=>'Mei',
        '06'=>'Juni',
        '07'=>'Juli',
        '08'=>'Agustus',
        '09'=>'September',
        '10'=>'Oktober',
        '11'=>'Nopember',
        '12'=>'Desember',
        );
        
        $show = $bulan[$paramx];
        
        return $show;
        
        }
        
        
        public function get_tgl()
        {
            for($i=1;$i<=31;$i++)
            {
                    if($i<=9){
                    $i = "0$i";
                    }else{
                    $i = $i;
                    }
                    
                    echo "<option value=\"$i\">$i</option>";
            }           
        }
    
    
   /**
     * -------------------------------------------------
     * Fungsi untuk menampilkan combobox
     * 
     * -------------------------------------------------
     **/ 
  
  
  public function option_tanggal()
  {
    for($i=1; $i<=31; $i++)
    {
      if($i <=9)
      {
        $i = "0$i";
      }else
      {
        $i = $i;
      }
      
      if(date('d') == $i)
      {
        $selected = "selected='selected'";
      }else
      {
        $selected = '';
      }
      echo "<option $selected>$i</option>";
    }
  }
  
  public function option_bulan(){
        
        $bulan = array(
        '01'=>'Januari',
        '02'=>'Februari',
        '03'=>'Maret',
        '04'=>'April',
        '05'=>'Mei',
        '06'=>'Juni',
        '07'=>'Juli',
        '08'=>'Agustus',
        '09'=>'September',
        '10'=>'Oktober',
        '11'=>'Nopember',
        '12'=>'Desember',
        );
        
        $parambl = date('m');
        
        for($i=1;$i<=12;$i++){
        if($i <=9){
        $i = "0$i";
        }else{
        $i = $i;
        }
        
        if($parambl == $i){
            $ceked = "selected=\"selected\"";
            }else{
                
                $ceked = "";
                }
        echo "<option value=\"$i\" $ceked>$bulan[$i]</option>";
        }
        }
        
        
        public function option_tahun()
        {
            $y = date('Y');
            
            
        
            for($i=2013;$i<=2030;$i++){
                
            if($i == $y){
                
            $ceked = " selected=\"selected\"";
            }else{
                
                $ceked = "";
                }
            echo "<option value=\"$i\"$ceked>$i</option>";
            }
        
        }
    
    
    public function option_tahun_full()
        {
            $y = date('Y');
            
            
        
            for($i=1930;$i<=2030;$i++){
                
            if($i == $y){
                
            $ceked = " selected=\"selected\"";
            }else{
                
                $ceked = "";
                }
            echo "<option value=\"$i\"$ceked>$i</option>";
            }
        
        }
    
    
    /**
     * -------------------------------------------------
     * Fungsi untuk menampilkan combobox edit
     * 
     * -------------------------------------------------
     **/
     
     public function option_tanggal_edit($param)
         {
            for($i=1;$i<=31;$i++)
            {
                    if($i<=9){
                    $i = "0$i";
                    }else{
                    $i = $i;
                    }
                    
          if($i == $param)
          {
            $select = 'selected="selected"';
          }else
          {
          
            $select = '';
          
          }
          
          
                    echo "<option value=\"$i\" $select>$i</option>";
            }           
        }
    
    public function option_bulan_edit($param){
        
        $bulan = array(
        '01'=>'Januari',
        '02'=>'Februari',
        '03'=>'Maret',
        '04'=>'April',
        '05'=>'Mei',
        '06'=>'Juni',
        '07'=>'Juli',
        '08'=>'Augustus',
        '09'=>'September',
        '10'=>'Oktober',
        '11'=>'Nopember',
        '12'=>'Desember',
        );
        
        
        for($i=1;$i<=12;$i++){
        if($i <=9){
        $i = "0$i";
        }else{
        $i = $i;
        }
        
        if($param == $i){
            $ceked = "selected=\"selected\"";
            }else{
                
                $ceked = "";
                }
        echo "<option value=\"$i\" $ceked>$bulan[$i]</option>";
        }
        }
    
    
    public function option_tahun_edit($y)
        {
            for($i=2010;$i<=2020;$i++){
                
            if($y == $i){
                
            $ceked = "selected=\"selected\"";
            }else{
                
                $ceked = "";
                }
            echo "<option $ceked>$i</option>";
            }
        
        }
    
    
     public function option_tahun_full_edit($y)
        {
            for($i=1930;$i<=2030;$i++){
                
            if($y == $i){
                
            $ceked = "selected=\"selected\"";
            }else{
                
                $ceked = "";
                }
            echo "<option $ceked>$i</option>";
            }
        
        }



         /**
     * -------------------------------------------------
     * Fungsi untuk memunculkan terbilang
     * 
     * -------------------------------------------------
     **/
    
     function Terbilang($x)
     {
      $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        if ($x < 12)
          $bilang =  " " . $abil[$x];
        elseif ($x < 20)
          $bilang =  $this->Terbilang($x - 10) . " belas ";
        elseif ($x < 100)
          $bilang =  $this->Terbilang($x / 10) . " puluh " . $this->Terbilang($x % 10);
        elseif ($x < 200)
          $bilang =  " seratus " . $this->Terbilang($x - 100);
        elseif ($x < 1000)
          $bilang =  $this->Terbilang($x / 100) . " ratus " . $this->Terbilang($x % 100);
        elseif ($x < 2000)
          $bilang =  " seribu " . $this->Terbilang($x - 1000);
        elseif ($x < 1000000)
          $bilang =  $this->Terbilang($x / 1000) . " ribu " . $this->Terbilang($x % 1000);
        elseif ($x < 1000000000)
          $bilang =  $this->Terbilang($x / 1000000) . " juta " . $this->Terbilang($x % 1000000);
        
        return strtoupper(trim($bilang));
    }



}
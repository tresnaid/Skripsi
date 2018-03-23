<?php  
class User_model extends CI_Model {

        public function getData($table)
        {
                $this->db->select("*");
                $this->db->from($table);
                $query = $this->db->get();
                return $query->result();
        }
        public function getOneData($table, $where, $data)
        {
            $query = $this->db->select('*')->from($table)->where($where, $data)->get()->result_array(); 
            if($query){
                    return $query;
            }else{
                    return 0;
            } 
        }
        public function getDataarray($table)
        {
                $this->db->select("*");
                $this->db->from($table);
                $query = $this->db->get();
                return $query->result_array();
        }
         public function getDataWhere($table, $where, $same)
        {
                $query = $this->db->get_where($table, array($where => $same));
                return $query->result_array();
        }
        public function getDataWhere2($table, $where, $same, $where2, $same2)
        {

                $query = $this->db->get_where($table, array($where => $same, $where2 => $same2));
                return $query->result_array();        }

        public function countwhere($table, $where, $where2)
        {
                $this->db->select("*");
                $this->db->from($table);
                $this->db->where($where, $where2);
                $query = $this->db->get();
                $rowcount = $query->num_rows();
                return $rowcount;
        }
        public function checkhitungkriteria($id)
        {
            $this->db->select('hitungkriteria');
            $this->db->from('t_user');
            $this->db->where('id_user', $id);
            $query = $this->db->get();
            return $query;
        }
        public function countmax($jumlah_measure, $jumlah_action, $jumlah_isneed)
        {
            if ($jumlah_measure ==0 && $jumlah_action ==0 && $jumlah_isneed ==0) {
                $nama = 'kosong';
                $jumlah_max = 0;
            }else{       
               $jumlah_max = $jumlah_measure;
               $nama = 'measure';
                if($jumlah_max<$jumlah_action) {
                    $jumlah_max = $jumlah_action;
                    $nama = 'action';
                    if ($jumlah_max<$jumlah_isneed) {
                        $jumlah_max = $jumlah_isneed;
                        $nama = 'isneed';
                    }
                }elseif ($jumlah_max<$jumlah_isneed) {
                    $jumlah_max = $jumlah_isneed;
                        $nama = 'isneed';

                }
            }
            $maksimal = array('nama' => $nama, 'jumlah' => $jumlah_max);
            return $maksimal;
        }

        public function join($table1, $table2, $where)
        {
                $this->db->select('*');
                $this->db->from($table1);
                $this->db->join($table2, $where);
                $query = $this->db->get();
                return $query->result();
        }
        public function timeline($table1, $table2, $where)
        {
                $this->db->select('*');
                $this->db->from($table1);
                $this->db->join($table2, $where);
                $this->db->order_by('tanggal', 'desc');
                $query = $this->db->get();
                return $query->result();
        }
         public function joingetwhere($table1, $table2, $where, $choose, $id)
        {
                $this->db->select('*');
                $this->db->from($table1);
                $this->db->join($table2, $where);
                $this->db->where($choose, $id);
                $query = $this->db->get();
                return $query->result();
        }
         public function getOneRecordor($table1, $coloumn, $where, $where2)
        {
                $this->db->select('*');
                $this->db->from($table1);
                $this->db->where($coloumn, $where);
                $this->db->or_where($coloumn, $where2);
                $query = $this->db->get();
                return $query->result();
        }

         public function getOneRecordor3($table1, $coloumn, $where, $where2, $where3)
        {
                $this->db->select('*');
                $this->db->from($table1);
                $this->db->where($coloumn, $where);
                $this->db->or_where($coloumn, $where2);
                $this->db->or_where($coloumn, $where3);
                $query = $this->db->get();
                return $query->result();
        }


        public function join3table($table1, $table2,$table3, $where,$where2, $choose, $id)
        {
                $this->db->select('*');
                $this->db->from($table1);
                $this->db->join($table2, $where);
                $this->db->join($table3, $where2);
                $this->db->where($choose, $id);
                $query = $this->db->get();
                return $query->result();
        }
        public function join3table1($table1, $table2,$table3, $where,$where2)
        {
                $this->db->select('*');
                $this->db->from($table1);
                $this->db->join($table2, $where);
                $this->db->join($table3, $where2);
                $query = $this->db->get();
                return $query->result();
        }
      
        public function count($table){
                $this->db->select("*");
                $this->db->from($table);
                $query = $this->db->get();
                $rowcount = $query->num_rows();
                return $rowcount;
        }
        
        public function getOneDatadesc($table, $where, $data,$sort)
        {
                $this->db->select('*');
                $this->db->from($table);
                $this->db->where($where, $data);
                $this->db->order_by($sort); 
                $query = $this->db->get();
                return $query->result();

        }

        public function insertData($table, $data)
        {
                $this->db->insert($table, $data);
        }

        public function updateData($table, $where, $tableId, $data)
        {
                $this->db->where($where, $tableId);
                $this->db->update($table, $data);
                
        }
       

        public function CheckUser($email){
                $sql = "SELECT * FROM t_user WHERE email = '".$email."'";

                $query = $this->db->query($sql);
                if($query->num_rows()>0){
                        return TRUE;
                }else{
                        return FALSE;
                }
        }

        public function CheckPass($email, $pass){
                $sql = "SELECT * FROM t_user WHERE email = '".$email."' and password = '".$pass."'";

                $query = $this->db->query($sql);
                if($query->num_rows()>0){
                        return TRUE;
                }else{
                        return FALSE;
                }
        }

        public function CheckLogin($username, $password){
                $sql = "SELECT * FROM t_user WHERE username = '".$username."' and password = '".$password."'";

                $query = $this->db->query($sql);
                if($query->num_rows()>0){
                        return TRUE;
                }else{
                        return FALSE;
                }
        }
        public function checkrole($email){
            $this->db->select('role');
            $this->db->from('t_user');
            $this->db->where('email', $email);
            
            $query = $this->db->get();
            return $query->row()->role;

        }
        public function checkidobjective($user){
            $this->db->select('id_objective');
            $this->db->from('t_objective');
            $this->db->where('id_user', $user);
            $this->db->order_by('id_objective', 'desc');
            $this->db->limit(1);
            $query = $this->db->get();
            return $query->row()->id_objective;
        }
        public function delete($table, $where, $clause)
        {
           $this->db->where($where, $clause);
           $this->db->delete($table); 
        }
        function ahp_get_matrik_kriteria($id_kriteria){
                    global $con;
                    for($i=0;$i<count($id_kriteria);$i++){
                        for($ii=0;$ii<count($id_kriteria);$ii++){
                            if($i==$ii){
                                $matrik[$i][$ii]=1;
                            }else{
                                if($i < $ii){
                                    $q=$this->db->query("select nilai from t_nilai_kriteria where id_kriteria_1='".$id_kriteria[$i]."' and id_kriteria_2='".$id_kriteria[$ii]."'");
                                    if($q->num_rows()>0){
                                        $h=$q->result_array();;
                                        $nilai=$q->row('nilai');
                                        $matrik[$i][$ii]=$nilai;
                                        $matrik[$ii][$i]=round((1/$nilai),4);
                                    }else{
                                        $matrik[$i][$ii]=1;
                                        $matrik[$ii][$i]=1;
                                    }
                                }
                            }
                        }
                    }
                    return $matrik;
                }
        function ahp_get_matrik_alternatif($id_kriteria, $id_alternatif){
            global $con;
            for($i=0;$i<count($id_alternatif);$i++){
                for($ii=0;$ii<count($id_alternatif);$ii++){
                    if($i==$ii){
                        $matrik[$i][$ii]=1;
                    }else{
                        if($i < $ii){
                            $q=$this->db->query("select nilai from t_nilai_alternatif where id_kriteria='".$id_kriteria."' and id_alternatif_1='".$id_alternatif[$i]."' and id_alternatif_2='".$id_alternatif[$ii]."'");
                            if($q->num_rows() >0){
                                $h=$q->result_array();
                                $nilai=$q->row('nilai');
                                $matrik[$i][$ii]=$nilai;
                                $matrik[$ii][$i]=round((1/$nilai),4);
                            }else{
                                $matrik[$i][$ii]=1;
                                $matrik[$ii][$i]=1;
                            }
                        }
                    }
                }
            }
            return $matrik;
        }
function ahp_get_jumlah_kolom($matrik){
    for($i=0;$i<count($matrik);$i++){
        $jumlah_kolom[$i] = 0;
        for($ii=0;$ii<count($matrik);$ii++){
            $jumlah_kolom[$i] = $jumlah_kolom[$i] + $matrik[$ii][$i];
        }
    }
    return $jumlah_kolom;
}
function ahp_get_normalisasi($matrik, $jumlah_kolom){
    for($i=0;$i<count($matrik);$i++){
        for($ii=0;$ii<count($matrik);$ii++){
            $matrik_normalisasi[$i][$ii] = round( $matrik[$i][$ii] / $jumlah_kolom[$ii] , 4 );
        }
    }
    return $matrik_normalisasi;
}
function ahp_get_eigen($matrik_normalisasi){
    for($i=0;$i<count($matrik_normalisasi);$i++){
        $eigen[$i] = 0;
        for($ii=0;$ii<count($matrik_normalisasi);$ii++){
            $eigen[$i] = $eigen[$i] + $matrik_normalisasi[$i][$ii];
        }
        $eigen[$i] = round( $eigen[$i] / count($matrik_normalisasi) , 4 );
    }
    return $eigen;
}

}
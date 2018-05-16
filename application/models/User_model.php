<?php  
class User_model extends CI_Model {

        public function getData($table)
        {
                $this->db->select("*");
                $this->db->from($table);
                $query = $this->db->get();
                return $query->result();
        }
        public function getDatakumulatif($table)
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
        
         public function getDataWhere($table, $where, $same)
        {
                $query = $this->db->get_where($table, array($where => $same));
                return $query->result_array();
        }
        public function getDataSubkriteria($table, $where, $same)
        {
                $query = $this->db->get_where($table, array($where => $same));
                return $query->result();
        }
        public function getDataWhere2($table, $where, $same, $where2, $same2)
        {

                $query = $this->db->get_where($table, array($where => $same, $where2 => $same2));
                return $query->result_array();        
        }
        public function count($table)
        {
                $this->db->select("*");
                $this->db->from($table);
                $query = $this->db->get();
                $rowcount = $query->num_rows();
                return $rowcount;
        }
        public function countwhere($table, $where, $where2)
        {
                $this->db->select("*");
                $this->db->from($table);
                $this->db->where($where, $where2);
                $query = $this->db->get();
                $rowcount = $query->num_rows();
                return $rowcount;
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

       
        public function hasil($table1, $table2, $where)
        {
                $this->db->select('*');
                $this->db->from($table1);
                $this->db->join($table2, $where);
                $this->db->order_by('nilai', 'desc');
                $query = $this->db->get();
                return $query->result();
        }
        public function hasil_fuzzy($table1, $table2, $where)
        {
                $this->db->select('*');
                $this->db->from($table1);
                $this->db->join($table2, $where);
                $this->db->order_by('nilai_hasil', 'desc');
                $query = $this->db->get();
                return $query->result();
        }
        public function hasil_fuzzy_perkriteria($table1, $table2, $where, $choose, $same)
        {
                $this->db->select('*');
                $this->db->from($table1);
                $this->db->join($table2, $where);
                $this->db->where($choose, $same);
                $this->db->order_by('nilai_hasil', 'desc');
                $query = $this->db->get();
                return $query->result();
        }
        public function timeline($table1, $table2, $where, $choose, $id)
        {
                $this->db->select('*');
                $this->db->from($table1);
                $this->db->join($table2, $where);
               
                $this->db->order_by('waktu', 'desc');
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
                $sql = "SELECT * FROM t_user WHERE username = '".$email."'";

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
        public function CheckId($id, $id_objective){
                $sql = "SELECT * FROM t_approval WHERE id_user = '".$id."' and id_objective = '".$id_objective."'";

                $query = $this->db->query($sql);
                if($query->num_rows()>0){
                        return FALSE;
                }else{
                        return TRUE;
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
        
        public function checkidbaru($username){
            $this->db->select('id_user');
            $this->db->from('t_user');
            $this->db->where('username', $username);
            $this->db->order_by('id_user', 'desc');
            $this->db->limit(1);
            $query = $this->db->get();
            return $query->row()->id_user;
        }
        public function checknama($id){
            $this->db->select('nama_user');
            $this->db->from('t_user');
            $this->db->where('id_user', $id);
            $query = $this->db->get();
            return $query->row()->nama_user;
        }
        public function checkdepartemen($id){
            $this->db->select('departemen');
            $this->db->from('t_user');
            $this->db->where('id_user', $id);
            $query = $this->db->get();
            return $query->row()->departemen;
        }
        public function checkstatus($status){
            $this->db->select('status');
            $this->db->from('t_status');
            $this->db->where('nama', $status);
            $query = $this->db->get();
            return $query->row()->status;
        }

        public function checkrole($email){
            $this->db->select('role');
            $this->db->from('t_user');
            $this->db->where('email', $email);
            
            $query = $this->db->get();
            return $query->row()->role;

        }
        public function checknilaialternatif($kode, $id){
            $this->db->select('nilai');
            $this->db->from('t_nilai_alternatif_'.$id);
            $this->db->where('kode', $kode);
            
            $query = $this->db->get();
            return $query->row()->nilai;

        }
        public function checknilaikriteria($kode, $id){
            $this->db->select('nilai');
            $this->db->from('t_nilai_kriteria_'.$id);
            $this->db->where('kode', $kode);
            
            $query = $this->db->get();
            return $query->row()->nilai;

        }
        public function checknilaihasilfuzzy($id_isneed, $id){
            $this->db->select('nilai_hasil');
            $this->db->from('t_fuzzy_perbandingan_semua_'.$id);
            $this->db->where('id_isneed', $id_isneed);
            
            $query = $this->db->get();
            return $query->row()->nilai_hasil;

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
        public function fuzzyahpkriteria($id_user)
        {
            for($i=0;$i<count($id_kriteria);$i++){
                for($ii=0;$ii<count($id_kriteria);$ii++){
                    if($i==$ii){
                        $matrik[$i][$ii]=1;
                    }else{
                        if($i < $ii){
                            $q=$this->db->query("select nilai, nilaimin, nilaimax from t_nilai_kriteria where id_kriteria_1='".$id_kriteria[$i]."' and id_kriteria_2='".$id_kriteria[$ii]."'");
                            if($q->num_rows()>0){
                                $h=$q->result_array();;
                                $nilai=$q->row('nilai');
                                $nilaimin=$q->row('nilaimin');
                                $nilaimax=$q->row('nilaimax');
                                $matrik[$i][$ii]=$nilai;
                                $matrik[$ii][$i]=round((1/$nilai),4);
                                $data_input=array(
                                    'nilai' => round((1/$nilai),4),
                                    'nilaimin' => round((1/$nilaimax),4),
                                    'nilaimax' => round((1/$nilaimin),4),
                                    'id_kriteria_1' => $id_kriteria[$ii],
                                    'id_kriteria_2' => $id_kriteria[$i]
                                );
                                $this->User_model->insertData('t_nilai_kriteria', $data_input);
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
        function ahp_get_matrik_kriteria($id_kriteria){
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
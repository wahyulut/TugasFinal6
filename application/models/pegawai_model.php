<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai_model extends CI_Model
    {
        public function data()
        {
            return $this->db->get('tb_data');
            
        }
        public function cluster()
        {

            return $this->db->get('cluster_data');
        }
        public function centroid()
        {
            return $this->db->get('p_centroid');
        }
}
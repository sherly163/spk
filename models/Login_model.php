<?php

use FontLib\Table\Type\post;

defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{

    function logged_id()
    {
        return $this->session->userdata('id_user');
    }

    public function login($username, $passwordx)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('password', $passwordx);
        return $this->db->get()->row();
    }

    public function default_kriteria($set)
    {
        $cekData = $this->db->from('kriteria')->where('id_user', $set->id_user)->get()->result();
        // var_dump($cekData);die;
        if (!$cekData) {
            // var_dump($set);die;
            $data = [
                [
                    'id_user' => $set->id_user,
                    'keterangan' => 'Harga Rumah',
                    'kode_kriteria' => 'C1',
                    'bobot' => '40',
                    'jenis' => 'Cost'
                ],
                [
                    'id_user' => $set->id_user,
                    'keterangan' => 'Jarak Ke Tempat Perbelanjaan',
                    'kode_kriteria' => 'C2',
                    'bobot' => '10',
                    'jenis' => 'Cost'
                ],
                [
                    'id_user' => $set->id_user,
                    'keterangan' => 'Jarak Ke Tempat Kesehatan',
                    'kode_kriteria' => 'C3',
                    'bobot' => '10',
                    'jenis' => 'Cost'
                ],
                [
                    'id_user' => $set->id_user,
                    'keterangan' => 'Jarak ke Fasilitas Umum',
                    'kode_kriteria' => 'C4',
                    'bobot' => '10',
                    'jenis' => 'Cost'
                ],
                [
                    'id_user' => $set->id_user,
                    'keterangan' => 'Fasilitas Di Perumahan',
                    'kode_kriteria' => 'C5',
                    'bobot' => '30',
                    'jenis' => 'Benefit'
                ]
            ];
            
            foreach ($data as $row) {
                $this->db->insert('kriteria', $row);
            }
            
        }
    }

    public function default_sub_kriteria($set)
    {
        $cekData = $this->db->from('sub_kriteria')->where('id_user', $set->id_user)->get()->result();
        if(!$cekData)
        {
            $C1 = $this->db->where('id_user',$set->id_user)->where('kode_kriteria','C1')->get('kriteria')->row();
            $data_C1 = [
                [
                    'id_kriteria' => $C1->id_kriteria ,
                    'id_user' => $set->id_user,
                    'deskripsi' => '<200jt' ,
                    'nilai' => 10
                ],
                [
                    'id_kriteria' => $C1->id_kriteria ,
                    'id_user' => $set->id_user,
                    'deskripsi' => '200-299jt' ,
                    'nilai' => 15
                ],
                [
                    'id_kriteria' => $C1->id_kriteria ,
                    'id_user' => $set->id_user,
                    'deskripsi' => '300-399jt' ,
                    'nilai' => 20
                ],
                [
                    'id_kriteria' => $C1->id_kriteria ,
                    'id_user' => $set->id_user,
                    'deskripsi' => '400-499jt' ,
                    'nilai' => 25
                ],
                [
                    'id_kriteria' => $C1->id_kriteria ,
                    'id_user' => $set->id_user,
                    'deskripsi' => '>500jt' ,
                    'nilai' => 30
                ],
            ];

            $C2 = $this->db->where('id_user',$set->id_user)->where('kode_kriteria','C2')->get('kriteria')->row();
            $data_C2 = [
                [
                    'id_kriteria' => $C2->id_kriteria ,
                    'id_user' => $set->id_user,
                    'deskripsi' => '<1KM' ,
                    'nilai' => 10
                ],
                [
                    'id_kriteria' => $C2->id_kriteria ,
                    'id_user' => $set->id_user,
                    'deskripsi' => '1-5 KM' ,
                    'nilai' => 15
                ],
                [
                    'id_kriteria' => $C2->id_kriteria ,
                    'id_user' => $set->id_user,
                    'deskripsi' => '6-10 KM' ,
                    'nilai' => 20
                ],
                [
                    'id_kriteria' => $C2->id_kriteria ,
                    'id_user' => $set->id_user,
                    'deskripsi' => '11-15 KM' ,
                    'nilai' => 25
                ],
                [
                    'id_kriteria' => $C2->id_kriteria ,
                    'id_user' => $set->id_user,
                    'deskripsi' => '>15 KM' ,
                    'nilai' => 30
                ],
            ];

            $C3 = $this->db->where('id_user',$set->id_user)->where('kode_kriteria','C3')->get('kriteria')->row();
            $data_C3 = [
                [
                    'id_kriteria' => $C3->id_kriteria ,
                    'id_user' => $set->id_user,
                    'deskripsi' => '<1KM' ,
                    'nilai' => 10
                ],
                [
                    'id_kriteria' => $C3->id_kriteria ,
                    'id_user' => $set->id_user,
                    'deskripsi' => '1-5 KM' ,
                    'nilai' => 15
                ],
                [
                    'id_kriteria' => $C3->id_kriteria ,
                    'id_user' => $set->id_user,
                    'deskripsi' => '6-10 KM' ,
                    'nilai' => 20
                ],
                [
                    'id_kriteria' => $C3->id_kriteria ,
                    'id_user' => $set->id_user,
                    'deskripsi' => '11-15 KM' ,
                    'nilai' => 25
                ],
                [
                    'id_kriteria' => $C3->id_kriteria ,
                    'id_user' => $set->id_user,
                    'deskripsi' => '>15 KM' ,
                    'nilai' => 30
                ],
            ];

            $C4 = $this->db->where('id_user',$set->id_user)->where('kode_kriteria','C4')->get('kriteria')->row();
            $data_C4 = [
                [
                    'id_kriteria' => $C4->id_kriteria ,
                    'id_user' => $set->id_user,
                    'deskripsi' => '<1KM' ,
                    'nilai' => 10
                ],
                [
                    'id_kriteria' => $C4->id_kriteria ,
                    'id_user' => $set->id_user,
                    'deskripsi' => '1-5 KM' ,
                    'nilai' => 15
                ],
                [
                    'id_kriteria' => $C4->id_kriteria ,
                    'id_user' => $set->id_user,
                    'deskripsi' => '6-10 KM' ,
                    'nilai' => 20
                ],
                [
                    'id_kriteria' => $C4->id_kriteria ,
                    'id_user' => $set->id_user,
                    'deskripsi' => '11-15 KM' ,
                    'nilai' => 25
                ],
                [
                    'id_kriteria' => $C4->id_kriteria ,
                    'id_user' => $set->id_user,
                    'deskripsi' => '>15 KM' ,
                    'nilai' => 30
                ],
            ];
            
            $C5 = $this->db->where('id_user',$set->id_user)->where('kode_kriteria','C5')->get('kriteria')->row();
            $data_C5 = [
                [
                    'id_kriteria' => $C5->id_kriteria ,
                    'id_user' => $set->id_user,
                    'deskripsi' => 'Sangat Lengkap' ,
                    'nilai' => 40
                ],
                [
                    'id_kriteria' => $C5->id_kriteria ,
                    'id_user' => $set->id_user,
                    'deskripsi' => 'Cukup Lengkap' ,
                    'nilai' => 35
                ],
                [
                    'id_kriteria' => $C5->id_kriteria ,
                    'id_user' => $set->id_user,
                    'deskripsi' => 'Tidak Lengkap' ,
                    'nilai' => 25
                ],
            ];

            foreach ($data_C1 as $row1) {
                $this->db->insert('sub_kriteria', $row1);
            }
            foreach ($data_C2 as $row2) {
                $this->db->insert('sub_kriteria', $row2);
            }
            foreach ($data_C3 as $row3) {
                $this->db->insert('sub_kriteria', $row3);
            }
            foreach ($data_C4 as $row4) {
                $this->db->insert('sub_kriteria', $row4);
            }
            foreach ($data_C5 as $row5) {
                $this->db->insert('sub_kriteria', $row5);
            }

        }

    }
}

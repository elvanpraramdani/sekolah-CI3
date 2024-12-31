<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas12 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kelas12');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Data Siswa Kelas 12';
        $data['kelas12'] = $this->M_kelas12->get_data('tb_kelas12')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kelas12/v_kelas12', $data);
        $this->load->view('templates/footer');
    }


    public function tambah_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'nisn'      => $this->input->post('nisn'),
                'nama'      => $this->input->post('nama'),
                'jk'        => $this->input->post('jk'),
                'kelas'     => $this->input->post('kelas'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'alamat'    => $this->input->post('alamat')
            );
            $this->M_kelas12->insert_data($data, 'tb_kelas12');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil DiTambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');

            redirect('kelas12');
        }
    }

    public function edit($id_siswa)
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'id_siswa'  => $id_siswa,
                'nisn'      => $this->input->post('nisn'),
                'nama'      => $this->input->post('nama'),
                'jk'        => $this->input->post('jk'),
                'kelas'     => $this->input->post('kelas'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'alamat'    => $this->input->post('alamat'),
            );
            $this->M_kelas12->update_data($data, 'tb_kelas12');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Di Update!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');

            redirect('kelas12');
        }
    }


    public function print()
    {
        $data['kelas12'] = $this->M_kelas12->get_data('tb_kelas12')->result();
        $this->load->view('guru/print_guru', $data);
        redirect('guru');
    }

    public function pdf()
    {
        $this->load->library('dompdf_gen');
        $data['kelas12'] = $this->M_kelas12->get_data('tb_kelas12')->result();
        $this->load->view('guru/pdf_guru', $data);

        $paper_size = 'a4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('guru/pdf_guru', array('attachment' => 0));
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nisn', 'Nisn', 'required', array(
            'required'  => 'Harus Di Isi !'
        ));
        $this->form_validation->set_rules('nama', 'Nama', 'required', array(
            'required'  => 'Harus Di Isi !'
        ));
        $this->form_validation->set_rules('jk', 'Jk', 'required', array(
            'required'  => 'Harus Di Isi !'
        ));
        $this->form_validation->set_rules('kelas', 'Kelas', 'required', array(
            'required'  => 'Harus Di Isi !'
        ));
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_lahir', 'required', array(
            'required'  => 'Harus Di Isi !'
        ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
            'required'  => 'Harus Di Isi !'
        ));
    }

    public function delete($id_siswa)
    {
        $where = array('id_siswa' => $id_siswa);
        $this->M_kelas12->delete($where, 'tb_kelas12');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Berhasil Di Hapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('kelas12');
    }
}

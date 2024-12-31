<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_guru');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Data Guru';
        $data['guru'] = $this->M_guru->get_data('tb_guru')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('guru/guru', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Guru';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('guru/tambah_guru');
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'nama'      => $this->input->post('nama'),
                'nip'      => $this->input->post('nip'),
                'jk'      => $this->input->post('jk'),
                'mapel'      => $this->input->post('mapel'),
                'agama'      => $this->input->post('agama'),
                'alamat'      => $this->input->post('alamat'),
            );
            $this->M_guru->insert_data($data, 'tb_guru');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil DiTambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');

            redirect('guru');
        }
    }

    public function edit($id_guru)
    {
        $data['title'] = 'Edit Guru';
        $where = array('id_guru' => $id_guru);
        $data['guru'] = $this->M_guru->edit_data($where, 'tb_guru')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('guru/edit_guru');
        $this->load->view('templates/footer');
    }

    public function edit_aksi()
    {

        $id_guru   = $this->input->post('id_guru');
        $nama      = $this->input->post('nama');
        $nip       = $this->input->post('nip');
        $jk        = $this->input->post('jk');
        $mapel     = $this->input->post('mapel');
        $agama     = $this->input->post('agama');
        $alamat    = $this->input->post('alamat');

        $data = array(
            'nama'      => $nama,
            'nip'       => $nip,
            'jk'        => $jk,
            'mapel'     => $mapel,
            'agama'     => $agama,
            'alamat'    => $alamat
        );

        $where = array(
            'id_guru'    => $id_guru
        );



        $this->M_guru->update_data($where, $data, 'tb_guru');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Di Update!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');

        redirect('guru');
    }

    public function print()
    {
        $data['guru'] = $this->M_guru->get_data('tb_guru')->result();
        $this->load->view('guru/print_guru', $data);
        redirect('guru');
    }

    public function pdf()
    {
        $this->load->library('dompdf_gen');
        $data['guru'] = $this->M_guru->get_data('tb_guru')->result();
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
        $this->form_validation->set_rules('nama', 'Nama', 'required', array(
            'required'  => 'Harus Di Isi !'
        ));
        $this->form_validation->set_rules('nip', 'Nip', 'required', array(
            'required'  => 'Harus Di Isi !'
        ));
        $this->form_validation->set_rules('jk', 'Jk', 'required', array(
            'required'  => 'Harus Di Isi !'
        ));
        $this->form_validation->set_rules('mapel', 'Mapel', 'required', array(
            'required'  => 'Harus Di Isi !'
        ));
        $this->form_validation->set_rules('agama', 'Agama', 'required', array(
            'required'  => 'Harus Di Isi !'
        ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
            'required'  => 'Harus Di Isi !'
        ));
    }

    public function delete($id_guru)
    {
        $where = array('id_guru' => $id_guru);
        $this->M_guru->delete($where, 'tb_guru');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Berhasil Di Hapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('guru');
    }
}

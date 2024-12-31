<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sarpras extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_sarpras');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Data Sarana & Prasarana';
        $data['sarpras'] = $this->M_sarpras->get_data('sarpras')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('sarpras/v_sarpras', $data);
        $this->load->view('templates/footer');
    }


    public function tambah_aksi()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'barang'      => $this->input->post('barang'),
                'jml_barang'  => $this->input->post('jml_barang'),
                'fasilitas'   => $this->input->post('fasilitas'),
                'ket'         => $this->input->post('ket'),
            );
            $this->M_sarpras->insert_data($data, 'sarpras');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil DiTambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');

            redirect('sarpras');
        }
    }

    public function edit($id_sarpras)
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(
                'id_sarpras'  => $id_sarpras,
                'barang'      => $this->input->post('barang'),
                'jml_barang'  => $this->input->post('jml_barang'),
                'fasilitas'   => $this->input->post('fasilitas'),
                'ket'         => $this->input->post('ket'),
            );
            $this->M_sarpras->update_data($data, 'sarpras');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Di Update!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');

            redirect('sarpras');
        }
    }


    public function print()
    {
        $data['sarpras'] = $this->M_sarpras->get_data('sarpras')->result();
        $this->load->view('guru/print_guru', $data);
        redirect('guru');
    }

    public function pdf()
    {
        $this->load->library('dompdf_gen');
        $data['sarpras'] = $this->M_sarpras->get_data('sarpras')->result();
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
        $this->form_validation->set_rules('barang', 'Barang', 'required', array(
            'required'  => 'Harus Di Isi !'
        ));
        $this->form_validation->set_rules('jml_barang', 'Jml_barang', 'required', array(
            'required'  => 'Harus Di Isi !'
        ));
        $this->form_validation->set_rules('fasilitas', 'Fasilitas', 'required', array(
            'required'  => 'Harus Di Isi !'
        ));
        $this->form_validation->set_rules('ket', 'Ket', 'required', array(
            'required'  => 'Harus Di Isi !'
        ));
    }

    public function delete($id_sarpras)
    {
        $where = array('id_sarpras' => $id_sarpras);
        $this->M_sarpras->delete($where, 'sarpras');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Data Berhasil Di Hapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('sarpras');
    }
}

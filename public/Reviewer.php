<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reviewer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata("logged") <> 1) {
            redirect(site_url('login'));
        }
        $this->load->model('m_dosen/ModelDosen', 'md');
        $this->load->model('m_publis/Model_aji', 'ma');
        $this->load->model('m_sesi/Model_user', 'mu');
        $this->load->model('m_litabmas/Model_litabmas', 'mlt');
        $this->load->library('uuid');
    }

    public function reviewer_penelitian()
    {
        $data = array(
            'title' => 'Penelitian Hibah Internal',
            'active_menu_rpenelitian' => 'active',
            'akun' => $this->mu->getUser(),
            'usulan' => $this->mlt->getUsulanReviewer()
        );

        $this->load->view('layouts/header', $data);
        $this->load->view('litabmas/reviewer/penelitian/index', $data);
        $this->load->view('layouts/footer');
    }


    public function detailUsulan()
    {
        $reff_ltb = $this->uri->segment(3);
        $data = array(
            'title' => 'Detail Usulan',
            'active_menu_rpenelitian' => 'active',
            'akun' => $this->mu->getUser(),
            'd' => $this->mlt->getlitabmas($reff_ltb),
            'viw' => $this->mlt->getRab($reff_ltb),
            'tot' => $this->mlt->sumRab($reff_ltb),
            'agt' => $this->mlt->getAnggota($reff_ltb),
            'mhs' => $this->mlt->getMahasiswa($reff_ltb),
            'lur' => $this->mlt->getlur($reff_ltb),
            'lurTam' => $this->mlt->getlurTambah($reff_ltb),
            'rab' => $this->mlt->getRabUsulan($reff_ltb)
        );
        $this->load->view('layouts/header', $data);
        $this->load->view('litabmas/reviewer/penelitian/detailUsulan', $data);
        $this->load->view('layouts/footer');
    }


    public function penilaian()
    {
        $reff_ltb = $this->uri->segment(3);
        $data = array(
            'title' => 'Penilaian Usulan',
            'active_menu_rpenelitian' => 'active',
            'akun' => $this->mu->getUser(),
            'd' => $this->mlt->getlitabmas($reff_ltb),
            'viw' => $this->mlt->getRab($reff_ltb),
            'tot' => $this->mlt->sumRab($reff_ltb),
            'agt' => $this->mlt->getAnggota($reff_ltb),
            'mhs' => $this->mlt->getMahasiswa($reff_ltb),
            'lur' => $this->mlt->getlur($reff_ltb),
            'lurTam' => $this->mlt->getlurTambah($reff_ltb),
            'n' => $this->mlt->getNilai($reff_ltb),
        );
        $this->load->view('layouts/header', $data);
        $this->load->view('litabmas/reviewer/penelitian/formNilai', $data);
        $this->load->view('layouts/footer');
    }


    public function penilaianGo()
    {
        $reff_ltb = htmlspecialchars($this->input->post('reff_ltb', true));
        $id_reviewer = htmlspecialchars($this->input->post('id_reviewer', true));
        $data = array(
            'title' => 'Pembagian Reviewer',
            'active_menu_rpenelitian' => 'active',
            'akun' => $this->mu->getUser(),
            'd' => $this->mlt->getlitabmas($reff_ltb),
            'viw' => $this->mlt->getRab($reff_ltb),
            'tot' => $this->mlt->sumRab($reff_ltb),
            'agt' => $this->mlt->getAnggota($reff_ltb),
            'mhs' => $this->mlt->getMahasiswa($reff_ltb),
            'lur' => $this->mlt->getlur($reff_ltb),
            'lurTam' => $this->mlt->getlurTambah($reff_ltb),
            'Reviewer' => $this->mlt->getReviewer()
        );

        $email = $this->session->userdata('email');
        $nv1 = htmlspecialchars($this->input->post('nv1', true));
        $nv2 = htmlspecialchars($this->input->post('nv2', true));
        $nv3 = htmlspecialchars($this->input->post('nv3', true));
        $nv4 = htmlspecialchars($this->input->post('nv4', true));
        $nv5 = htmlspecialchars($this->input->post('nv5', true));
        $nv6 = htmlspecialchars($this->input->post('nv6', true));
        $nv7 = htmlspecialchars($this->input->post('nv7', true));
        $nv8 = htmlspecialchars($this->input->post('nv8', true));
        $nv9 = htmlspecialchars($this->input->post('nv9', true));
        $nv10 = htmlspecialchars($this->input->post('nv10', true));
        $skor = $nv1 + $nv2 + $nv3 + $nv4 + $nv5 + $nv6 + $nv7 + $nv8 + $nv9 + $nv10;
        $date_nilai = date('Y-m-d H:i:s');


        $log_system = array(
            'reff_ltb' => $reff_ltb,
            'email_log' => $email,
            'logsystem' => "reviwer Memberi Nilai Penelitian",
            'date_created' => date('Y-m-d H:i:s')
        );



        $this->db->set('nv1', $nv1);
        $this->db->set('nv2', $nv2);
        $this->db->set('nv3', $nv3);
        $this->db->set('nv4', $nv4);
        $this->db->set('nv5', $nv5);
        $this->db->set('nv6', $nv6);
        $this->db->set('nv7', $nv7);
        $this->db->set('nv8', $nv8);
        $this->db->set('nv9', $nv9);
        $this->db->set('nv10', $nv10);
        $this->db->set('skor', $skor);
        $this->db->set('date_nilai', $date_nilai);
        $this->db->where('id_reviewer', $id_reviewer);
        $this->db->update('ltb_reviewer');


        $this->db->insert('ltb_log', $log_system);
        $this->session->set_flashdata('sukses', 'Disimpan');
        redirect('reviewer/penilaian/' . $reff_ltb);
    }

    public function rab()
    {
        $reff_ltb = $this->uri->segment(3);
        $data = array(
            'title' => 'RAB',
            'active_menu_rpenelitian' => 'active',
            'akun' => $this->mu->getUser(),
            'd' => $this->mlt->getlitabmas($reff_ltb),
            'viw' => $this->mlt->getReviewerRab($reff_ltb),
            'tot' => $this->mlt->sumRab($reff_ltb),
            'n' => $this->mlt->getNilai($reff_ltb)
        );
        $this->load->view('layouts/header', $data);
        $this->load->view('litabmas/reviewer/penelitian/formRab', $data);
        $this->load->view('layouts/footer');
    }

    public function kirimKonfirmasi()
    {
        $reff_ltb = $this->uri->segment(3);
        $data = array(
            'title' => 'RAB',
            'active_menu_rpenelitian' => 'active',
            'akun' => $this->mu->getUser(),
            'd' => $this->mlt->getlitabmas($reff_ltb),
            'viw' => $this->mlt->getReviewerRab($reff_ltb),
            'tot' => $this->mlt->sumRab($reff_ltb),
            'n' => $this->mlt->getNilai($reff_ltb),
        );
        $this->load->view('layouts/header', $data);
        $this->load->view('litabmas/reviewer/penelitian/formKonfirmasi', $data);
        $this->load->view('layouts/footer');
    }

    public function kirimPenilaianGo()
    {
        $reff_ltb = htmlspecialchars($this->input->post('reff_ltb', true));
        $id_reviewer = htmlspecialchars($this->input->post('id_reviewer', true));

        $email = $this->session->userdata('email');
        $data = array(
            'title' => 'Dokumen Pendukung',
            'active_menu_sipemas_penelitian' => 'menu-open',
            'active_menu_sp' => 'active',
            'active_menu_penelitian_ub' => 'active',
            'akun' => $this->mu->getUser(),
        );

        $sts_reviewer = 2;
        $date_nilai = date('Y-m-d H:i:s');

        $log_system = array(
            'reff_ltb' => htmlspecialchars($this->input->post('reff_ltb', true)),
            'email_log' => $email,
            'logsystem' => "Submit Proposal Penelitian Hibah Internal ",
            'date_created' => date('Y-m-d H:i:s')
        );


        $this->db->set('sts_reviewer', $sts_reviewer);
        $this->db->set('date_nilai', $date_nilai);
        $this->db->where('id_reviewer', $id_reviewer);
        $this->db->update('ltb_reviewer');



        $this->db->insert('ltb_log', $log_system);
        $this->session->set_flashdata('sukses', 'submit');
        redirect('reviewer/reviewer_penelitian');
    }

    public function rabGo()
    {

        $data = array(
            'title' => 'Dokumen Pendukung',
            'active_menu_sipemas_penelitian' => 'menu-open',
            'active_menu_sp' => 'active',
            'active_menu_penelitian_ub' => 'active',
            'akun' => $this->mu->getUser(),
        );
        $id_reviewer = htmlspecialchars($this->input->post('id_reviewer', true));
        $reff_ltb = htmlspecialchars($this->input->post('reff_ltb', true));
        $persen = htmlspecialchars($this->input->post('persen', true));
        $catatan_rab = htmlspecialchars($this->input->post('catatan_rab', true));
        $dana_rekom = preg_replace('/[^0-9]/', '', htmlspecialchars($this->input->post('dana_rekom', true)));
        $email = $this->session->userdata('email');
        $date_nilai = date('Y-m-d H:i:s');

        $this->db->set('catatan_rab', $catatan_rab);
        $this->db->set('persen', $persen);
        $this->db->set('dana_rekom', $dana_rekom);
        $this->db->set('date_nilai', $date_nilai);
        $this->db->where('id_reviewer', $id_reviewer);
        $this->db->update('ltb_reviewer');


        $this->session->set_flashdata('sukses', 'submit');
        redirect('reviewer/rab/' . $reff_ltb);
    }

    public function cetakProposal()
    {
        $reff_ltb = $this->uri->segment(3);
        $data = array(
            'title' => 'Detail Usulan',
            'active_menu_lppm_penelitian' => 'active',
            'akun' => $this->mu->getUser(),
            'd' => $this->mlt->getlitabmas($reff_ltb),
            'viw' => $this->mlt->getRab($reff_ltb),
            'tot' => $this->mlt->sumRab($reff_ltb),
            'agt' => $this->mlt->getAnggota($reff_ltb),
            'mhs' => $this->mlt->getMahasiswa($reff_ltb), 
            'lur' => $this->mlt->getlur($reff_ltb),
            'lurTam' => $this->mlt->getDetlurTambah($reff_ltb),
            'dr' => $this->mlt->getDetailReviewer($reff_ltb),
            'raba' => $this->mlt->getRabUsulan($reff_ltb),
            'reviewer' => $this->mlt->getDetReviewer($reff_ltb),
        );

        $this->load->view('litabmas/reviewer/penelitian/cetakProposal', $data);
    }


    public function lap_kemajuan_reviewer_penelitian()
    {
        $data = array(
            'title' => 'Lap. KrmajuanPenelitian Hibah',
            'active_menu_rpenelitian' => 'active',
            'akun' => $this->mu->getUser(),
            'usulan' => $this->mlt->getUsulanReviewer_lap_kemajuan()
        );

        $this->load->view('layouts/header', $data);
        $this->load->view('litabmas/reviewer/penelitian/lap_kemajuan', $data);
        $this->load->view('layouts/footer');
    }


    public function nilai_pd()
    {
        $reff_ltb = $this->uri->segment(4);
        $data = array(
            'title' => 'Penilaian Lap Kemajuan PD',
            'active_menu_rpenelitian' => 'active',
            'akun' => $this->mu->getUser(),
            'd' => $this->mlt->getlitabmas($reff_ltb),
            'viw' => $this->mlt->getRab($reff_ltb),
            'tot' => $this->mlt->sumRab($reff_ltb),
            'agt' => $this->mlt->getAnggota($reff_ltb),
            'mhs' => $this->mlt->getMahasiswa($reff_ltb),
            'lur' => $this->mlt->getlur($reff_ltb),
            'lurTam' => $this->mlt->getlurTambah($reff_ltb),
            'n' => $this->mlt->getNilai($reff_ltb),
        );
        $this->load->view('layouts/header', $data);
        $this->load->view('litabmas/reviewer/penelitian/pd_form', $data);
        $this->load->view('layouts/footer');
    }


    public function nilai_pdGo()
    {
        $reff_ltb = htmlspecialchars($this->input->post('reff_ltb', true));
        $sts_luaran = htmlspecialchars($this->input->post('sts_luaran', true));
        $nlr1 = $this->input->post('nlr1', true);
        $nlr2 = $this->input->post('nlr2', true);
        $nlr3 = $this->input->post('nlr3', true);
        $nlr4 = $this->input->post('nlr4', true);
        $nlr5 = $this->input->post('nlr5', true);
        $nlr6 = $this->input->post('nlr6', true);
        $catatan_reviewer = $this->input->post('catatan_reviewer', true);
        $date_kemajuan = date('Y-m-d H:i:s');
        $email = $this->session->userdata('email');
        $sts_kemajuan = 4;


        $data = array(
            'title' => 'Pembagian Reviewer',
            'active_menu_rpenelitian' => 'active',
            'akun' => $this->mu->getUser(),
            'd' => $this->mlt->getlitabmas($reff_ltb),
            'viw' => $this->mlt->getRab($reff_ltb),
            'tot' => $this->mlt->sumRab($reff_ltb),
            'agt' => $this->mlt->getAnggota($reff_ltb),
            'mhs' => $this->mlt->getMahasiswa($reff_ltb),
            'lur' => $this->mlt->getlur($reff_ltb),
            'lurTam' => $this->mlt->getlurTambah($reff_ltb),
            'Reviewer' => $this->mlt->getReviewer()
        );

        $log_system = array(
            'reff_ltb' => $reff_ltb,
            'email_log' => $email,
            'logsystem' => "reviwer Memberi Nilai Penelitian",
            'date_created' => date('Y-m-d H:i:s')
        );

        $this->db->set('nlr1', $nlr1);
        $this->db->set('nlr2', $nlr2);
        $this->db->set('nlr3', $nlr3);
        $this->db->set('nlr4', $nlr4);
        $this->db->set('nlr5', $nlr5);
        $this->db->set('nlr6', $nlr6);
        $this->db->set('catatan_reviewer', $catatan_reviewer);
        $this->db->set('date_kemajuan', $date_kemajuan);
        $this->db->where('reff_ltb', $reff_ltb);
        $this->db->update('ltb_kemajuan_penelitian');


        $this->db->set('sts_kemajuan', $sts_kemajuan);
        $this->db->set('sts_luaran', $sts_luaran);
        $this->db->set('date_lap_reviewer', $date_kemajuan);
        $this->db->where('reff_ltb', $reff_ltb);
        $this->db->update('ltb_litabmas');


        $this->db->insert('ltb_log', $log_system);
        $this->session->set_flashdata('sukses', 'Disimpan');
        redirect('reviewer/lap_kemajuan_reviewer_penelitian');
    }

    public function nilai_pdp()
    {
        $reff_ltb = $this->uri->segment(4);
        $data = array(
            'title' => 'Penilaian Lap Kemajuan PDP',
            'active_menu_rpenelitian' => 'active',
            'akun' => $this->mu->getUser(),
            'd' => $this->mlt->getlitabmas($reff_ltb),
            'viw' => $this->mlt->getRab($reff_ltb),
            'tot' => $this->mlt->sumRab($reff_ltb),
            'agt' => $this->mlt->getAnggota($reff_ltb),
            'mhs' => $this->mlt->getMahasiswa($reff_ltb),
            'lur' => $this->mlt->getlur($reff_ltb),
            'lurTam' => $this->mlt->getlurTambah($reff_ltb),
            'n' => $this->mlt->getNilai($reff_ltb),
        );
        $this->load->view('layouts/header', $data);
        $this->load->view('litabmas/reviewer/penelitian/pdp_form', $data);
        $this->load->view('layouts/footer');
    }


    public function nilai_pdpGo()
    {
        $reff_ltb = htmlspecialchars($this->input->post('reff_ltb', true));
        $sts_luaran = htmlspecialchars($this->input->post('sts_luaran', true));
        $nlr2 = $this->input->post('nlr2', true);
        $nlr3 = $this->input->post('nlr3', true);
        $nlr4 = $this->input->post('nlr4', true);
        $nlr5 = $this->input->post('nlr5', true);
        $nlr6 = $this->input->post('nlr6', true);
        $catatan_reviewer = $this->input->post('catatan_reviewer', true);
        $date_kemajuan = date('Y-m-d H:i:s');
        $email = $this->session->userdata('email');
        $sts_kemajuan = 4;


        $data = array(
            'title' => 'Pembagian Reviewer',
            'active_menu_rpenelitian' => 'active',
            'akun' => $this->mu->getUser(),
            'd' => $this->mlt->getlitabmas($reff_ltb),
            'viw' => $this->mlt->getRab($reff_ltb),
            'tot' => $this->mlt->sumRab($reff_ltb),
            'agt' => $this->mlt->getAnggota($reff_ltb),
            'mhs' => $this->mlt->getMahasiswa($reff_ltb),
            'lur' => $this->mlt->getlur($reff_ltb),
            'lurTam' => $this->mlt->getlurTambah($reff_ltb),
            'Reviewer' => $this->mlt->getReviewer()
        );

        $log_system = array(
            'reff_ltb' => $reff_ltb,
            'email_log' => $email,
            'logsystem' => "reviwer Memberi Nilai Penelitian",
            'date_created' => date('Y-m-d H:i:s')
        );

        $this->db->set('nlr1', $nlr1);
        $this->db->set('nlr2', $nlr2);
        $this->db->set('nlr3', $nlr3);
        $this->db->set('nlr4', $nlr4);
        $this->db->set('nlr5', $nlr5);
        $this->db->set('nlr6', $nlr6);
        $this->db->set('catatan_reviewer', $catatan_reviewer);
        $this->db->set('date_kemajuan', $date_kemajuan);
        $this->db->set('sts_luaran', $sts_luaran);
        $this->db->where('reff_ltb', $reff_ltb);
        $this->db->update('ltb_kemajuan_penelitian');


        $this->db->set('sts_kemajuan', $sts_kemajuan);
        $this->db->set('date_lap_reviewer', $date_kemajuan);
        $this->db->where('reff_ltb', $reff_ltb);
        $this->db->update('ltb_litabmas');


        $this->db->insert('ltb_log', $log_system);
        $this->session->set_flashdata('sukses', 'Disimpan');
        redirect('reviewer/lap_kemajuan_reviewer_penelitian');
    }

    public function nilai_pt()
    {
        $reff_ltb = $this->uri->segment(4);
        $data = array(
            'title' => 'Penilaian Lap Kemajuan PT',
            'active_menu_rpenelitian' => 'active',
            'akun' => $this->mu->getUser(),
            'd' => $this->mlt->getlitabmas($reff_ltb),
            'viw' => $this->mlt->getRab($reff_ltb),
            'tot' => $this->mlt->sumRab($reff_ltb),
            'agt' => $this->mlt->getAnggota($reff_ltb),
            'mhs' => $this->mlt->getMahasiswa($reff_ltb),
            'lur' => $this->mlt->getlur($reff_ltb),
            'lurTam' => $this->mlt->getlurTambah($reff_ltb),
            'n' => $this->mlt->getNilai($reff_ltb),
        );
        $this->load->view('layouts/header', $data);
        $this->load->view('litabmas/reviewer/penelitian/pt_form', $data);
        $this->load->view('layouts/footer');
    }


    public function nilai_ptGo()
    {
        $reff_ltb = htmlspecialchars($this->input->post('reff_ltb', true));
        $sts_luaran = htmlspecialchars($this->input->post('sts_luaran', true));
        $nlr1 = $this->input->post('nlr1', true);
        $nlr2 = $this->input->post('nlr2', true);
        $nlr3 = $this->input->post('nlr3', true);
        $nlr4 = $this->input->post('nlr4', true);
        $nlr5 = $this->input->post('nlr5', true);
        $nlr6 = $this->input->post('nlr6', true);
        $catatan_reviewer = $this->input->post('catatan_reviewer', true);
        $date_kemajuan = date('Y-m-d H:i:s');
        $email = $this->session->userdata('email');
        $sts_kemajuan = 4;


        $data = array(
            'title' => 'Pembagian Reviewer',
            'active_menu_rpenelitian' => 'active',
            'akun' => $this->mu->getUser(),
            'd' => $this->mlt->getlitabmas($reff_ltb),
            'viw' => $this->mlt->getRab($reff_ltb),
            'tot' => $this->mlt->sumRab($reff_ltb),
            'agt' => $this->mlt->getAnggota($reff_ltb),
            'mhs' => $this->mlt->getMahasiswa($reff_ltb),
            'lur' => $this->mlt->getlur($reff_ltb),
            'lurTam' => $this->mlt->getlurTambah($reff_ltb),
            'Reviewer' => $this->mlt->getReviewer()
        );

        $log_system = array(
            'reff_ltb' => $reff_ltb,
            'email_log' => $email,
            'logsystem' => "reviwer Memberi Nilai Penelitian",
            'date_created' => date('Y-m-d H:i:s')
        );

        $this->db->set('nlr1', $nlr1);
        $this->db->set('nlr2', $nlr2);
        $this->db->set('nlr3', $nlr3);
        $this->db->set('nlr4', $nlr4);
        $this->db->set('nlr5', $nlr5);
        $this->db->set('nlr6', $nlr6);
        $this->db->set('catatan_reviewer', $catatan_reviewer);
        $this->db->set('date_kemajuan', $date_kemajuan);
        $this->db->where('reff_ltb', $reff_ltb);
        $this->db->update('ltb_kemajuan_penelitian');


        $this->db->set('sts_kemajuan', $sts_kemajuan);
        $this->db->set('date_lap_reviewer', $date_kemajuan);
        $this->db->set('sts_luaran', $sts_luaran);
        $this->db->where('reff_ltb', $reff_ltb);
        $this->db->update('ltb_litabmas');


        $this->db->insert('ltb_log', $log_system);
        $this->session->set_flashdata('sukses', 'Disimpan');
        redirect('reviewer/lap_kemajuan_reviewer_penelitian');
    }



    public function detail_penilaian_pd()
    {
        $reff_ltb = $this->uri->segment(4);
        $data = array(
            'title' => 'Penilaian Lap Kemajuan PD',
            'active_menu_rpenelitian' => 'active',
            'akun' => $this->mu->getUser(),
            'd' => $this->mlt->getlitabmas_pd($reff_ltb),
            'ttd' => $this->mlt->getlitabmas_ttd($reff_ltb),
        );
        $this->load->view('litabmas/reviewer/penelitian/p_lap_kemajuan_pd', $data);
    }

    public function detail_penilaian_pdp()
    {
        $reff_ltb = $this->uri->segment(4);
        $data = array(
            'title' => 'Penilaian Lap Kemajuan PDP',
            'active_menu_rpenelitian' => 'active',
            'akun' => $this->mu->getUser(),
            'd' => $this->mlt->getlitabmas_pd($reff_ltb),
            'ttd' => $this->mlt->getlitabmas_ttd($reff_ltb),
        );
        $this->load->view('litabmas/reviewer/penelitian/p_lap_kemajuan_pdp', $data);
    }

    public function detail_penilaian_pt()
    {
        $reff_ltb = $this->uri->segment(4);
        $data = array(
            'title' => 'Penilaian Lap Kemajuan PT',
            'active_menu_rpenelitian' => 'active',
            'akun' => $this->mu->getUser(),
            'd' => $this->mlt->getlitabmas_pd($reff_ltb),
            'ttd' => $this->mlt->getlitabmas_ttd($reff_ltb),
        );
        $this->load->view('litabmas/reviewer/penelitian/p_lap_kemajuan_pt', $data);
    }
}

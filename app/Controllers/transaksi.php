<?php

namespace App\Controllers;

use App\Models\Modeltransaksi;

class transaksi extends BaseController
{
    public function index()
    {
        $model = new ModelTransaksi();
        $data['transaksi'] = $model->gettransaksi()->getResultArray();
        $data['pelanggan'] = $model->getpelanggan()->getResult();
        $data['tarif'] = $model->gettarif()->getResult();
        echo view('transaksi/v_transaksi', $data);
    }
    public function save()
    {
        $model = new ModelTransaksi();
        $data = array(

            'idpelanggan' => $this->request->getPost('idpel'),
            'idharga' => $this->request->getPost('idtarif'),
            'meterblnini' => $this->request->getPost('meterblnini'),
            'meterblnlalu' => $this->request->getPost('meterblnlalu'),
            'tglbayar' => $this->request->getPost('tanggal'),
        );

        $model->insertData($data);
        return redirect()->to('/transaksi');
    }
    public function delete()
    {
        $model = new Modeltransaksi();
        $id = $this->request->getPost('id');
        $model->deletetransaksi($id);
        return redirect()->to('/transaksi/index');
    }
    function update()
    {
        $model = new Modeltransaksi();
        $id = $this->request->getPost('id');
        $data = array(
            'tanggal' => $this->request->getPost('tanggal'),
            'ket' => $this->request->getPost('ket'),
            'kas_masuk' => $this->request->getPost('transaksi'),
            // 'kas_keluar' => 0,
            'jenis_kas' => $this->request->getPost('jeniskas'),
            // 'status' => 'Masuk',
            'iddonaturmasjid' => $this->request->getPost('iddonatur1'),
        );
        $model->updatetransaksi($data, $id);
        return redirect()->to('/transaksi/index');
    }
    public function laporantransaksi()
    {
        if (session()->get('masuk') == true) {
            if (session()->get('level') == 1) {
                $model = new Modeltransaksi();
                $data['data'] = $model->getLaporanUangMasuk()->getResultArray();
                echo view('/transaksi/cetak_laporan', $data);
            } else {
                echo "<script>alert('Anda Tidak Berhak'); window.location.href='/layout';</script>";
            }
        } else {
            echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
    }
    public function laporanperperiode()
    {
        echo view('/transaksi/v_cetaklaporanperperiode');
    }
    public function laporanperjenis()
    {
        if (session()->get('masuk') == true) {
            if (session()->get('level') == 1) {
                echo view('/transaksi/vlaporanperjeniskas');
            } else {
                echo "<script>alert('Anda Tidak Berhak'); window.location.href='/layout';</script>";
            }
        } else {
            echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
    }
    public function cetaklaporanperperiode()
    {
        $model = new Modeltransaksi();
        $tgla = $this->request->getPost('tanggal_awal');
        $tglb = $this->request->getPost('tanggal_akhir');
        $query = $model->getLaporanperperiode($tgla, $tglb)->getResultArray();
        $data = [
            'tgla' => $tgla,
            'tglb' => $tglb,
            'data' => $query
        ];
        echo view('/transaksi/v_laporanperperiode', $data);
    }
    public function cetaklaporanperperiodeperjeniskas()
    {
        if (session()->get('masuk') == true) {
            if (session()->get('level') == 1) {
                $model = new Modeltransaksi();
                $tgla = $this->request->getPost('tanggal_awal');
                $tglb = $this->request->getPost('tanggal_akhir');
                $jenis = $this->request->getPost('jeniskas');
                $query = $model->getLaporanperperiodeperjenis($tgla, $tglb, $jenis)->getResultArray();
                $data = [
                    'tgla' => $tglb,
                    'tglb' => $tgla,
                    'jenis' => $jenis,
                    'data' => $query
                ];
                echo view('/transaksi/v_cetaklaporanperperiodeperjeniskas', $data);
            } else {
                echo "<script>alert('Anda Tidak Berhak'); window.location.href='/layout';</script>";
            }
        } else {
            echo "<script>alert('Anda Belum Login'); window.location.href='/login';</script>";
        }
    }
}

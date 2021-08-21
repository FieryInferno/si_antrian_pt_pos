<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cek_model extends CI_Model
{
    public function getgajipensiunan($nip)
    {
        $hsl = $this->db->query("SELECT * FROM gajipensiunan WHERE nip='$nip'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $tanggaldanwaktu = new DateTime($data->tanggal);
                $tanggal = $tanggaldanwaktu->format("Y-m-d");
                $tanggal = nama_hari($tanggal) . ' ' . tgl_indo($tanggal);
                $hasil = array(
                    'nip' => $data->nip,
                    'nama' => $data->nama,
                    'judul' => $data->judul,
                    'kartutandapensiun' => $data->kartutandapensiun,
                    'gaji' => $data->gaji,
                    'tanggal' => $tanggal,
                    'deskripsi' => $data->deskripsi,
                );
            }
        }

        return $hasil;
    }

    public function getpengiriman($noresi)
    {
        $hsl = $this->db->query("SELECT * FROM pengiriman WHERE noresi='$noresi'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $tanggaldanwaktu = new DateTime($data->tanggalpengiriman);
                $tanggal = $tanggaldanwaktu->format("Y-m-d");
                $tanggal = nama_hari($tanggal) . ' ' . tgl_indo($tanggal);
                $hasil = array(
                    'noresi' => $data->noresi,
                    'namapengirim' => $data->namapengirim,
                    'nohppengirim' => $data->nohppengirim,
                    'namapenerima' => $data->namapenerima,
                    'nohppenerima' => $data->nohppenerima,
                    'alamatpenerima' => $data->alamatpenerima,
                    'kota' => $data->kota,
                    'namabarang' => $data->namabarang,
                    'jenisbarang' => $data->jenisbarang,
                    'beratbarang' => $data->beratbarang,
                    'jumlahbarang' => $data->jumlahbarang,
                    'biaya' => $data->biaya,
                    'tanggalpengiriman' => $data->tanggalpengiriman,
                );
            }
        }

        return $hasil;
    }

    public function getwesel($nowesel)
    {
        $hsl = $this->db->query("SELECT * FROM wesel WHERE nowesel='$nowesel'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $tanggaldanwaktu = new DateTime($data->tanggalwesel);
                $tanggal = $tanggaldanwaktu->format("Y-m-d");
                $tanggal = nama_hari($tanggal) . ' ' . tgl_indo($tanggal);
                $hasil = array(
                    'nowesel' => $data->nowesel,
                    'nama' => $data->nama,
                    'noktp' => $data->noktp,
                    'biaya' => $data->biaya,
                    'tanggalwesel' => $data->tanggalwesel,
                );
            }
        }

        return $hasil;
    }

    public function getpembayaran($novirtual)
    {
        $hsl = $this->db->query("SELECT * FROM pembayaran WHERE novirtual='$novirtual'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $tanggaldanwaktu = new DateTime($data->tanggalpembayaran);
                $tanggal = $tanggaldanwaktu->format("Y-m-d");
                $tanggal = nama_hari($tanggal) . ' ' . tgl_indo($tanggal);
                $hasil = array(
                    'novirtual' => $data->novirtual,
                    'nama' => $data->nama,
                    'judul' => $data->judul,
                    'biaya' => $data->biaya,
                    'tanggalpembayaran' => $data->tanggalpembayaran,
                );
            }
        }

        return $hasil;
    }
}

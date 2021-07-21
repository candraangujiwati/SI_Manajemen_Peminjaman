<?php 
/**
* 
*/
class cetak extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
        $this->load->library('pdf');
    }

function cetak(){

$pdf = new FPDF('l','mm','A5');
    // membuat halaman baru
    $pdf->AddPage();
    // setting jenis font yang akan digunakan
    $pdf->SetFont('Arial','B',16);
    // mencetak string 
    $pdf->Cell(190,7,'Sistem Peminjaman Ruang',0,1,'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(190,7,'Rekapan Peminjaman',0,1,'C');
    // Memberikan space kebawah agar tidak terlalu rapat
    $pdf->Cell(10,7,'',0,1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(10,6,'NO',1,0);
    $pdf->Cell(27,6,'TANGGAL PESAN',1,0);
    $pdf->Cell(23,6,'TANGGAL PINJAM',1,0);
    $pdf->Cell(27,6,'NAMA KEGIATAN',1,0);
    $pdf->Cell(27,6,'NAMA PEMINJAMAN',1,1);
    $pdf->Cell(27,6,'NO. HP PEMINJAMAN',1,1);
    $pdf->Cell(27,6,'NAMA RUANG',1,1);
    $pdf->SetFont('Arial','',10);
    $peminjaman = $this->db->query('select a.*,b.*,c.*
	from peminjaman a 
	 join ruang b 
	on a.id_ruang=b.id_ruang
	join pinjam_ruang c 
	on a.id_peminjaman=c.id_peminjaman
	where a.status_pinjam=2 
	order by a.status_pinjam desc')->result();
    foreach ($peminjaman as $row){
        $pdf->Cell(10,6,$row->id_peminjaman,1,0);
        $pdf->Cell(40,6,$row->tgl_pesan,1,0);
        $pdf->Cell(23,6,$row->tgl_pinjam,1,0);
        $pdf->Cell(27,6,$row->nama_kegiatan,1,0); 
        $pdf->Cell(27,6,$row->nama_peminjaman,1,1);
		$pdf->Cell(27,6,$row->no_hp_peminjam,1,1);
		$pdf->Cell(27,6,$row->nama_ruang,1,1);
    }
    $pdf->Output();
}
}
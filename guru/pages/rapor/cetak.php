<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../../../asset/vendor/tc-lib/Tcpdf.php');

// Instansiasi class TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Author Name');
$pdf->SetTitle('Rapor Siswa');

// Disable header and footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Set default margin
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Add a page
$pdf->AddPage();

// Set font for cover rapor
$pdf->SetFont('helvetica', 'B', 16);

// Cover rapor content
$html = '<div class="cover">
	<h1>Rapor Siswa</h1>
	<h2>Sekolah Dasar Negeri XX</h2>
	<table>
		<tr>
			<td>Nama Siswa</td>
			<td>:</td>
			<td><?= $data_siswa['nama_siswa'] ?></td>
		</tr>
		<tr>
			<td>NISN</td>
			<td>:</td>
			<td><?= $data_siswa['nisn'] ?></td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td>:</td>
			<td><?= $data_siswa['nama_kelas'] ?></td>
		</tr>
		<tr>
			<td>Semester</td>
			<td>:</td>
			<td><?= $data_siswa['id_semester'] ?></td>
		</tr>
		<tr>
			<td>Tahun Ajar</td>
			<td>:</td>
			<td><?= $data_siswa['tahun_ajar'] ?></td>
		</tr>
	</table>
</div>';


// Output cover rapor
$pdf->writeHTML($html, true, false, true, false, '');

// Add a page
$pdf->AddPage();

// Set font for identitas siswa
$pdf->SetFont('helvetica', 'B', 16);

// Identitas siswa content
$html = '<table>
            <tr>
                <td align="center">
                    <h2>IDENTITAS SISWA</h2>
                </td>
            </tr>
            <tr>
                <td align="left">
                    <p>Nama Siswa : </p>
                </td>
            </tr>
            <tr>
                <td align="left">
                    <p>NISN : </p>
                </td>
            </tr>
            <tr>
                <td align="left">
                    <p>Kelas : </p>
                </td>
            </tr>
         </table>';

// Output identitas siswa
$pdf->writeHTML($html, true, false, true, false, '');

// Add a page
$pdf->AddPage();

// Set font for nilai
$pdf->SetFont('helvetica', 'B', 16);

// Nilai content
$html = '<table>
            <tr>
                <td><b>Mata Pelajaran</b></td>
                <td><b>KKM</b></td>
                <td><b>Nilai</b></td>
                </tr>';

// Tampilkan data nilai dari database
$sql = "SELECT * FROM tb_nilai WHERE nisn = '$nisn' AND id_semester = '$semester' AND tahun_ajar = '$tahun_ajar'";
$nilai = mysqli_query($koneksi, $sql);

while ($data = mysqli_fetch_array($nilai)) {
    $html .= '<tr>
                <td>' . $data['mata_pelajaran'] . '</td>
                <td>' . $data['kkm'] . '</td>
                <td>' . $data['nilai'] . '</td>
                </tr>';
}

$html .= '</table>';

// Output nilai
$pdf->writeHTML($html, true, false, true, false, '');

// Output PDF
$pdf->Output('Rapor_Siswa_' . $nisn . '.pdf', 'I');

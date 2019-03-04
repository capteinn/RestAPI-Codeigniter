<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function index()
	{
		$this->load->library('simple_html_dom');
		
		$html_load = file_get_html(FCPATH .'krs-html\test.html');
		// Create DOM from URL or file
		// $html_load = new simple_html_dom();
		// $html_load->load('<html><body></body></html>');
		// $html = file_get_html('https://stackoverflow.com/questions/1767943/html-parser-codeigniter-library');
		
		// Find all images 
		// foreach($html->find('img') as $element) 
			// echo $element->src . '<br>';
		
		// Find all links 
		// foreach($html->find('table tr td') as $element) 
			// echo $element->plaintext . '<br>';
		$hasil = array();
		$i = 0;
		// if($html_load && is_object($html_load) && isset($html_load->nodes)){
			// foreach ($html_load->find('div.page-break') as $data ) {
				// $j=0;
				// foreach ($data->find('table tr') as $element) {
					// $hasil[$i][$j] = $element->children(1)->plaintext;
					// $j++;
					// // echo $element->children(2)->plaintext . "<br>";
				// }
				// $i++;
			// }
		// }
		
		if($html_load && is_object($html_load) && isset($html_load->nodes)){
			foreach ($html_load->find('div.page-break') as $data ) {
				$j=0;
				foreach ($data->find('table tr') as $element) {
					// $hasil[$data] = $data->children(1)->plaintext;
					// if (!empty($element->children(1)->plaintext)){
						$hasil[$i]["nama_kelas"][$j] = $element->children(1)->plaintext . "<br>";
					// }
					if (!empty($element->children(2)->plaintext)){
						$hasil[$i]["kode_MK"][$j] = $element->children(2)->plaintext . "<br>";
					}
					if (!empty($element->children(3)->plaintext)){
						$hasil[$i]["nama_MK"][$j] = $element->children(3)->plaintext . "<br>";
					}
					$j++;
				}
				$i++;
			}
			// echo "<hr>";
		}
		
		// var_dump($hasil);
		// echo "<hr>";
		foreach($hasil as $data) {
		
			foreach ($data as $key => $value) {
				// echo "Mahasiswa : " . end($value) . "<br>";
				// echo "Mengambil Kelas : ";
				// echo "<ol>";
				// echo $key . " ";
				//kode_MK = 6 
				//nama_MK = 3
				//nama_kelas = 8
				if ($key == "nama_kelas") {
					echo end($value);
					echo "<br>";
					foreach(array_slice($value, 8, 15) as $item) {
						if ($item != '&nbsp;'){
							echo $item;
						}else{
							break;
						}
					}
				}
				// if ($key == "kode_MK") {
					// foreach(array_slice($value, 6) as $item) {
						// echo $item;
					// }				
				// }
				// if ($key == "nama_MK") {
					// foreach(array_slice($value, 3) as $item) {
						// echo $item;
					// }				
				// }
				// echo "<hr>";
				// echo "<hr>";
				// echo "<hr>";
				// foreach (array_slice($value, 8) as $item) {
					// // if ($item != '&nbsp;'){
						// echo "<li>";
						// echo $item;
						// echo "</li>";				
					// // }else{
						// // break;
					// // }
				// }
				// echo "</ol>";
				// echo "<hr>";
			}
			echo "<hr>";
		}
		// echo "<hr>";
		// foreach ($hasil as $data) {
			// echo "Mahasiswa : " . end($data) . "<br>";
			// echo "Mengambil Kelas : ";
			// echo "<ol>";
			// // echo $data;
			// foreach (array_slice($data, 8) as $item) {
				// // if ($item != '&nbsp;'){
					// echo "<li>";
					// echo $item;
					// echo "</li>";				
				// // }else{
					// // break;
				// // }
			// }
			// echo "</ol>";
			// echo "<hr>";
		// }
		echo FCPATH .'krs-html\krs.html';
		$html_load->clear(); 
		unset($html_load);

		
		
		
		// echo $html_load->find("div[class=page-break] table tr td[width=38%]")->children(1)->childNodes(1)->childNodes(2)->getAttribute('id');
		// var_dump($html_load);
		
		// echo "<br>";
		// echo "<br>";
		// echo "<br>";
		// echo "<br>";
		// echo "find element <br>";
		// echo $html->find('a')->plaintext;
		
		// $this->load->view('welcome_message');
	}
	
	public function test()
	{
		$this->load->library('simple_html_dom');
		
		$html_load = file_get_html(FCPATH .'krs-html\test.html');
		
		$hasil = array();
		// $i = 0;
		
		if($html_load && is_object($html_load) && isset($html_load->nodes)){
			foreach ($html_load->find('div.page-break') as $data ) {
				// $j=0;
				
				// echo $data->children(0)->children(0)->children(0)->children(1)->children(0) . "<br>";
				// echo $data->children(5)->children(0)->children(0)->children(2) . "<br>";
				echo $data->children(5)->children(0)->children(0)->children(2) . "<br>";
				echo $data->children(5)->children(0)->children(1)->children(2) . "<br>";
				//echo $data->children(6)->children(0)->children(0)->children(2)->children(1) . "<br>";
				
				// echo $data->children(7)->children(0)->children(0)->find('tr td[nowrap=nowrap]') . "<br>";
				echo $data->children(7)->children(0);
				foreach ($data->find('div.no-break table tr td[rowspan=2]') as $lele) {
					// if ($lele) {
					// foreach ($lele->find('tbody tr') as $i) {
						echo $lele . "<br>";
					// }
					// }
				}
				
				// foreach ($data as $element) {
					// // $hasil[$data] = $data->children(1)->plaintext;
					// // if (!empty($element->children(1)->plaintext)){
					// // }
					// // if (!empty($element->children(2)->plaintext)){
						// // $hasil[$i]["kode_MK"][$j] = $element->children(2)->plaintext . "<br>";
					// // }
					// // if (!empty($element->children(3)->plaintext)){
						// // $hasil[$i]["nama_MK"][$j] = $element->children(3)->plaintext . "<br>";
					// // }
					// $j++;
				// }
				// $i++;
			}
		}
		
		// var_dump($hasil);
		// echo "<hr>";
		foreach($hasil as $data) {
		
			foreach ($data as $key => $value) {
				//kode_MK = 6 
				//nama_MK = 3
				//nama_kelas = 8
				if ($key == "nama_kelas") {
					echo end($value);
					echo "<br>";
					foreach(array_slice($value, 8, 15) as $item) {
						if ($item != '&nbsp;'){
							echo $item;
						}else{
							break;
						}
					}
				}
			}
			echo "<hr>";
		}
		
		echo FCPATH .'krs-html\krs.html';
		$html_load->clear(); 
		unset($html_load);
	}
}

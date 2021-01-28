<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function getstruk()
	{
		// die(json_encode($this->input->post()));

        $myfile = fopen(FCPATH.'settings.txt', "r");
        // some code to be executed....
        // Output one line until end-of-file
        $text = '';
        while(!feof($myfile)) {
            $text .= fgets($myfile);
        }
        echo $text;
        fclose($myfile);
    }
    
    public function savestruk()
	{

        // "image":"images/st24systemtopup24jam.png",
        // "nama_outlet":"",
        // "alamat" : "",
        // "no_telpon":"",
        // "web_link":"",
        // "facebook_link":"",
        // "instagram_link":"",
        // "twitter_link":"",
        // "note":"Terimakasih atas kepercayaan anda, jangan lupa kunjungi sosial media kami"
		// die(json_encode($this->input->post()));

        $myfile = fopen(FCPATH.'settings.txt', "r");
        // some code to be executed....
        // Output one line until end-of-file
        $text = '';
        while(!feof($myfile)) {
            $text .= fgets($myfile);
        }
        $text_setting = json_decode($text);

        $text_setting->image = $this->input->post('image');
        $text_setting->nama_outlet = $this->input->post('nama_outlet');
        $text_setting->alamat = $this->input->post('alamat');
        $text_setting->no_telepon = $this->input->post('no_telepon');
        $text_setting->web_link = $this->input->post('web_link');
        $text_setting->facebook_link = $this->input->post('facebook_link');
        $text_setting->instagram_link = $this->input->post('instagram_link');
        $text_setting->twitter_link = $this->input->post('twitter_link');
        $text_setting->note = $this->input->post('note');

        fclose($myfile);

        $str = json_encode($text_setting); 
        //write the entire string
        file_put_contents('settings.txt', $str);

        echo json_encode([
            'status' => 'Sukses',
            'pesan' => 'Data berhasil disimpan',
            'data' => $this->input->post()
        ]);
	}
}

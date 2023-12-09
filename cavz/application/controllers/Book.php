<?php
defined('BASEPATH') or exit('No direct script access allowed');
class book extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model("Book_m", "", TRUE);
    $this->load->library('form_validation');
    $this->user = get_userdata("self_pro_loggedin");
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
  }
  public function index()
  {
    if ($this->user) {
      $this->load->view('book_list');
    } else {
      redirect("Login");
    }
  }
  public function create()
  {
    if ($this->user) {
      $data['mode'] = "";
      $data['category']  = $this->Book_m->get_category();
      $this->load->view('create_book', $data);
    } else {
      redirect("Login");
    }
  }
  public function insertbook($mode = "")
  {
    $this->form_validation->set_rules('title', 'Title', 'trim|required');
    $this->form_validation->set_rules('author', 'Author', 'trim|required');
    $this->form_validation->set_rules('descr', 'Description', 'trim|required');
    $this->form_validation->set_rules('publication_date', 'Publication Date', 'trim|required');
    $this->form_validation->set_rules('bookfile', 'File', 'trim|required');

    if ($this->form_validation->run() == FALSE) {
      $error =  validation_errors();
      $this->create();
    } else {
      $ts = date('Y-m-d H:i:s');
      if ($mode == "") {
        $docfile = $_FILES['bookfile']['name'];
        if ($docfile != "") {
          $dname = explode(".", $_FILES['bookfile']['name']);
          $ext = end($dname);
          $file_name1 = strtolower(time() . '.' . $ext);
          $config['upload_path'] = './uploads/books';
          $config['file_name'] = $file_name1;
          $config['allowed_types'] = 'pdf';
          $config['max_size'] = '1048576';
          $config['max_width'] = '1024000';
          $config['max_height'] = '768000';
          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          $doc = $file_name1;
          if (!$this->upload->do_upload('bookfile')) {
            exit(json_encode(
              array(
                'status' => false,
                'reason' => $this->upload->display_errors(),
                'message' => 'Error in Attachment',
              )
            ));
          }
        } else {
          $doc = "";
        }
        $data = array(
          "book_title"   => $this->input->post("title"),
          "book_author"   => $this->input->post("author"),
          "book_descr"   => $this->input->post("descr"),
          "book_category" => $this->input->post("catname"),
          "book_publication_date"   => $this->input->post("publication_date"),
          "book_pdf"   => $doc,
          "book_created_by"   => $this->user['uid'],
          "book_created_at" => $ts,
        );
        $return = $this->Book_m->insertbook($data);

        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Succesfully Inserted.</div>');
        $this->index();
      } else {
        $docfile = $_FILES['bookfile']['name'];
        if ($docfile != "") {
          $dname = explode(".", $_FILES['bookfile']['name']);
          $ext = end($dname);
          $file_name1 = strtolower(time() . '.' . $ext);
          $config['upload_path'] = './uploads/books';
          $config['file_name'] = $file_name1;
          $config['allowed_types'] = 'pdf';
          $config['max_size'] = '1000000';
          $config['max_width'] = '1024000';
          $config['max_height'] = '768000';
          $this->load->library('upload', $config);
          $this->upload->initialize($config);
          $doc = $file_name1;
          if (!$this->upload->do_upload('bookfile')) {
            exit(json_encode(
              array(
                'status' => false,
                'reason' => $this->upload->display_errors(),
                'message' => 'Error in Attachment',
              )
            ));
          }
        } else {
          $doc = $this->input->post("filename");
        }
        $updatedata = array(
          "book_title"   => $this->input->post("title"),
          "book_author"   => $this->input->post("author"),
          "book_descr"   => $this->input->post("descr"),
          "book_category" => $this->input->post("catname"),
          "book_publication_date"   => $this->input->post("publication_date"),
          "book_updated_at"   => $ts,
          "book_updated_by" => $this->user['uid'],
        );
        $return = $this->Book_m->updatebook($mode, $updatedata);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Updated Succesfully.</div>');
        $this->index();
      }
    }
  }
  public function get_books($record = 0)
  {
    $request = $this->input->post();
    $recordPerPage = 10;
    if ($record != 0) {
      $record = ($record - 1) * $recordPerPage;
    }
    $recordCount = $this->Book_m->getRecord_bookCount($request);
    $empRecord = $this->Book_m->getRecordbook($record, $recordPerPage, $request);
    $config['base_url'] = base_url() . 'Book/get_books';
    $config['use_page_numbers'] = TRUE;
    $config['next_link'] = 'Next';
    $config['prev_link'] = 'Previous';
    $config['total_rows'] = $recordCount;
    $config['per_page'] = $recordPerPage;
    $config['full_tag_open'] = '';
    $config['full_tag_close'] = '';
    $config['num_tag_open'] = '<li class="page-item m-1">';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="page-item active m-1"><a href="#" class="page-link">';
    $config['cur_tag_close'] = '</a></li>';
    $config['prev_tag_open'] = '<li class="page-item previous disabled m-1"><a href="#" class="page-link"><i class="previous"></i></a></li>';
    $config['prev_tag_close'] = '';
    $config['next_tag_open'] = '<li class="page-item next m-1"><a href="#" class="page-link"><i class="next"></i></a></li>';
    $config['next_tag_close'] = '';
    $config['attributes'] = array('class' => 'page-link');
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    $data['empData'] = $empRecord;
    echo json_encode($data);
  }
  public function edit_book($id)
  {
    $data['records'] = $this->Book_m->getbook_details($id);
    $data['mode'] = $id;
    $data['category']  = $this->Book_m->get_category();
    $this->load->view('create_book', $data);
  }
  public function detail($id)
  {
    $data['details']  = $this->Book_m->getbook_details($id);
    $this->load->view('book_detail', $data);
  }
}

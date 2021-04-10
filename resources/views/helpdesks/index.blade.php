@extends('layouts.adminlte')

@section('page_name')
    | Helpdesk Main Page
@endsection

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12" style="background-color: #2375fa;">
                <h3 style="margin:50px; color:#FFFFFF">
                    ::Form แจ้งซ่อมฯ V 0.2::
                </h3>
            </div>
  
      <div class="col-12 col-sm-12 col-md-12">
        <h3 style="margin:50px; color:#FFFFFF">
        ::Form แจ้งซ่อมฯ V 0.2::
        </h3>
      </div>
  
      <div class="col-sm-3 col-md-3" style="margin-top: 30px"></div>
      <div class="col col-sm-9 col-md-9" style="margin-top: 30px">
        <form action="<?php= site_url('form/adding');?>" method="post" class="form-horizontal" enctype="multipart/form-data">
          <div class="form-group col col-md-7">
            <label>ประเภทปัญหา</label>
            <select name="case_type" class="form-control" required>
            <?php if(('case_type')!=''){?>
              <option value="<?php= set_value('case_type'); ?>"><?php= set_value('case_type'); ?></option>
            <?php } else{
                echo '<option value="">Choose...</option>';
            }
            ?>
              
              <option value="อุปกรณ์ไอที">-อุปกรณ์ไอที-</option>
              <option value="ประปา">-ประปา-</option>
              <option value="อาคาร">-อาคาร-</option>
              <option value="เครื่องใช้ไฟฟ้า">-เครื่องใช้ไฟฟ้า-</option>
            </select>
          </div>
          <div class="form-group col col-md-7">
            <label>รายละเอียดปัญหา</label>
            <textarea name="case_detail" class="form-control" required minlength="5" placeholder="*ต้องการข้อมูล"><?php= set_value('case_detail'); ?></textarea>
            <span class="fr"><?php= form_error('case_detail'); ?></span>
          </div>
          <div class="form-group col col-md-7">
            <label>สถานที่</label>
            <textarea name="case_loc" class="form-control" required minlength="5" placeholder="*ระบุตึก ชั้น ห้อง สถานที่ให้ครบถ้วน"><?php= set_value('case_loc'); ?></textarea>
            <span class="fr"><?php= form_error('case_loc'); ?></span>
          </div>
          <div class="form-group col col-md-5">
            <label>ชื่อผู้แจ้ง</label>
            <input type="text" name="p_name" class="form-control" required minlength="3" placeholder="*ต้องการข้อมูล" value="<?php= set_value('p_name'); ?>">
            <span class="fr"><?php= form_error('p_name'); ?></span>
          </div>
          <div class="form-group col col-md-5">
            <label>อีเมลผู้แจ้ง</label>
            <input type="email" name="p_email" class="form-control" required  placeholder="*ต้องการข้อมูล" value="<?php= set_value('p_email'); ?>">
            <span class="fr"><?php= form_error('p_email'); ?></span>
          </div>
          <div class="form-group col  col-md-5">
            <label>ภาพประกอบ (บังคับ)</label>
            <input type="file" name="p_img" class="form-control"  accept="image/*" required>
            <span class="fr"><?php= $error;?></span>
          </div>
          <div class="form-group col col-md-5">
            <button type="submit" class="btn btn-primary" style="width: 100%">แจ้งซ่อม</button>
          </div>
        </form>
      </div>
      
    </div>
  </div>

@endsection

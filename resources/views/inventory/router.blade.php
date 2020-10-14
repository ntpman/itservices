@extends('layouts.admin')

@section('title','Dashboard | Role Informations')
    
@section('content_header')
    <h1>สิทธิ์การใช้งานระบบ</h1>
@stop

@section('content')
  <div class="row">
      <div class="col-md-12">
        <div class="card text-sm ">
            <div class="card-header card-success card-outline">
                <div class="card-title">
                    <h5><i class="fas fa-laptop-house text-success"></i> ข้อมูลครุภัณฑ์ </h5>
                </div>
                <div class="card-tools">
                  <button type="button" class="btn btn-warning" title="แก้ไขข้อมูลครุภัณฑ์" data-toggle="modal" data-target="#modal-edit-info"><i class="fas fa-edit"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-angle-double-down"></i></button>
                </div>
            </div>
            <div class="card-body col-md-12">
                <div class="row">
                    <div class="col-md-3 text-center">
                        <img class="img-fluid " src="{{ asset('images/banner_1_0.png') }}" alt="User profile picture"> 
                    </div>
                    <div class="col-md-9">
                        <h6><strong> สถานะ : </strong> ใช้งาน </h6>
                        <h6><strong> ประเภท : </strong> เครื่องกระจายสํญญาณอินเตอร์เน็ต</h6>
                        <h6><strong> ยี่ห้อ : </strong> D-Link</h6>
                        <h6><strong> รุ่น : </strong> VI1221CE</h6>
                        <h6><strong> Serial : </strong> CN23BWN2WW</h6>
                        <h6><strong> เลขทะเบียน : </strong> วศ.สล.08-008/8 2555 </h6>
                        <h6><strong> ผู้รับผิดชอบ : </strong> นายทรัพย์ สวนด้วง โทร 7210</h6>
                    </div>
                </div>
            </div>
            <div class="card-footer d-none">
            </div>
        </div>
      </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="card text-sm ">
          <div class="card-header card-success card-outline">
              <div class="card-title">
                  <h5> <i class="fas fa-shopping-cart text-success"></i> การจัดซื้อ</h5>
              </div>
              <div class="card-tools">
                <button type="button" class="btn btn-warning" title="แก้ไขข้อมูลการจัดซื้อ" data-toggle="modal" data-target="#modal-edit-buy"><i class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="collapse" data-target="#collapseBuy" aria-expanded="false" aria-controls="collapseBuy"> <i class="fas fa-angle-double-down"></i> </button>
              </div>
          </div>
          <div class="collapse" id="collapseBuy">
          <div class="card-body col-md-12">
              <div class="row">
                  <div class="col-md-6">
                    <h6><strong> ปีงบประมาณที่จัดซื้อ : </strong> 2563 </h6>
                    <h6><strong> วันที่ตรวจรับ : </strong> 23/05/63 </h6>
                    <h6><strong> วันสิ้นสุดการรับประกัน : </strong> 23/05/63 </h6>
                    <h6><strong> ผู้แทนจำหน่าย : </strong> บริษัท เจไอบี จำกัด</h6>
                  </div>
              </div>
          </div>
          </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card text-sm ">
          <div class="card-header card-success card-outline">
              <div class="card-title">
                  <h5><i class="fas fa-people-carry text-success"></i> ผู้รับผิดชอบ </h5>
              </div>
              <div class="card-tools">
                <button type="button" class="btn btn-warning" title="แก้ไขข้อมูลผู้รับผิดชอบ" data-toggle="modal" data-target="#modal-edit-owner"><i class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="collapse" data-target="#collapseOwner" aria-expanded="false" aria-controls="collapseOwner"><i class="fas fa-angle-double-down"></i></button>
              </div>
          </div>
          <div class="collapse" id="collapseOwner">
            <div class="card-body col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <h6><strong> สถานที่ตั้ง : </strong> ตึกมาตร ชั้น 3 ห้อง 301</h6>
                        <h6><strong> ผู้รับผิดชอบ : </strong> นายทรัพย์ สวนด้วง โทร 7510</h6>
                    </div>
                </div>
            </div>
          </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
        <div class="card text-sm">
            <div class="card-header card-success card-outline">
                <div class="card-title">
                    <h5><i class="fas fa-info-circle text-success"></i> รายละเอียดครุภัณฑ์เพิ่มเติม</h5>
                </div>
                <div class="card-tools">
                  <button type="button" class="btn btn-success" title="เพิ่มรายละเอียดครุภัณฑ์" data-toggle="modal" data-target="#modal-add-detail"><i class="fas fa-plus"></i></button>
                  <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#collapseDetail" aria-expanded="false" aria-controls="collapseDetail"><i class="fas fa-angle-double-down"></i></button>
                </div>
            </div>
            <div class="collapse" id="collapseDetail">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="" class="table table-bordered table-hover table-striped table-sm display"  style='table-layout:fixed' cellspacing="0" width="100%">
                                <thead class="table-success">                  
                                    <tr>
                                        <th class="d-none">For id</th>
                                        <th class="text-center align-middle" style="width: 5%">ลำดับ</th>
                                        <th class="text-center align-middle" style="width: 40%">รายละเอียด</th>
                                        <th class="text-center align-middle" style="width: 5%">จำนวน</th>
                                        <th class="text-center align-middle" style="width: 40%">หมายเหตุ</th>
                                        <th class="text-center align-middle" style="width: 5%">แก้ไข</th>
                                        <th class="text-center align-middle" style="width: 5%">ลบ</th>
                                    </tr>
                                </thead>
                                <tbody class="items">
                                  <tr class="item">
                                    <td class="id d-none">for id</td>
                                    <td class="text-center align-middle">1</td>
                                    <td class="align-middle">Port</td>
                                    <td class="text-center align-middle">4</td>
                                    <td class="align-middle">50/100</td>
                                    <td class=""><button type="button" class="btn btn-block btn-info btn-warning"><i class="fas fa-edit"></i></button></td>
                                    <td class=""><button type="button" class="btn btn-block btn-info btn-danger"> <i class="fas fa-trash"></i></button></td>
                                </tr>
                                </tbody>                        
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card text-sm">
          <div class="card-header card-success card-outline">
              <div class="card-title">
                  <h5> <i class="fas fa-tools text-success"></i> ประวัติการซ่อม-บำรุงครุภัณฑ์ </h6>
              </div>
              <div class="card-tools">
                <button type="button" class="btn btn-success" title="เพิ่มประวัติการซ่อมบำรุง" data-toggle="modal" data-target="#modal-add-fix">
                  <i class="fas fa-plus"></i>
                </button>
                  <button type="button" class="btn btn-tool" data-toggle="collapse" data-target="#collapseFix" aria-expanded="false" aria-controls="collapseFix">
                      <i class="fas fa-angle-double-down"></i>
                  </button>
              </div>
          </div>
          <div class="collapse" id="collapseFix">
              <div class="card-body">
                  <div class="table-responsive">
                      <table id="" class="table table-bordered table-hover table-striped table-sm display"  style='table-layout:fixed' cellspacing="0" width="100%">
                              <thead class="table-success">                  
                                  <tr>
                                      <th class="d-none">For id</th>
                                      <th class="text-center align-middle" style="width: 5%">วัน/เดือน/ปี</th>
                                      <th class="text-center align-middle" style="width: 30%">รายการการซ่อมบำรุง</th>
                                      <th class="text-center align-middle" style="width: 15%">ผู้ปฏิบัติงาน</th>
                                      <th class="text-center align-middle" style="width: 15%">หน่วยงาน</th>
                                      <th class="text-center align-middle" style="width: 20%">หมายเหตุ</th>
                                      <th class="text-center align-middle" style="width: 5%">แก้ไข</th>
                                      <th class="text-center align-middle" style="width: 5%">ลบ</th>
                                  </tr>
                              </thead>
                              <tbody class="items">
                                <tr class="item">
                                  <td class="id d-none">for id</td>
                                  <td class="text-center align-middle">12/09/63</td>
                                  <td class="align-middle">ตรวจเช็คประจำปีและทำความสะอาด</td>
                                  <td class="align-middle text-center">ทรงพล อะวิสุ</td>
                                  <td class="align-middle">ทด.สล.</td>
                                  <td class="align-middle">ใช้งานปกติดี</td>
                                  <td class=""><button type="button" class="btn btn-block btn-warning"><i class="fas fa-edit"></i></button></td>
                                  <td class=""><button type="button" class="btn btn-block btn-danger"> <i class="fas fa-trash"></i></button></td>
                              </tr>
                              </tbody>                        
                      </table>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>

{{-- Modal --}}
<div class="modal fade" id="modal-add-detail" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title">เพิ่มข้อมูลรายละเอียดครุภัณฑ์</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <div class="card-body">
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">รายละเอียด</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">จำนวน</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">หมายเหตุ</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">ย้อนกลับ</button>
        <button type="button" class="btn btn-primary">บันทึก</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-add-fix" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title">เพิ่มประวัติการซ่อม-บำรุง</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <div class="card-body">
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">วัน/เดือน/ปี</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">รายละเอียดการซ่อม-บำรุง</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">ผู้ปฏิบัติงาน</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">หน่วยงาน</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">หมายเหตุ</label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">ย้อนกลับ</button>
        <button type="button" class="btn btn-primary">บันทึก</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-edit-buy" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h4 class="modal-title">แก้ไขข้อมูลการจัดซื้อ</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <div class="card-body">
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">ปีงบประมาณที่จัดซื้อ</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">วันที่ตรวจรับ</label>
              <div class="col-sm-9">
                <input type="date" class="form-control" id="">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">วันสิ้นสุดการรับประกัน</label>
              <div class="col-sm-9">
                <input type="date" class="form-control" id="">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">ผู้แทนจัดจำหน่าย</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="">
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">ย้อนกลับ</button>
        <button type="button" class="btn btn-primary">บันทึก</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-edit-owner" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h4 class="modal-title">แก้ไขข้อมูลผู้รับผิดชอบ</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <div class="card-body">
            <div class="row">
              <label for="" class="col-sm-12">สถานที่ตั้ง</label>
            </div>
            <div class="form-group row">
              <div class="input-group col-sm-4">
                <div class="input-group-prepend">
                  <span class="input-group-text">อาคาร</span>
                </div>
                <input type="text" class="form-control">
              </div>
              <div class="input-group col-sm-4">
                <div class="input-group-prepend">
                  <span class="input-group-text">ชั้น</span>
                </div>
                <input type="text" class="form-control">
              </div>
              <div class="input-group col-sm-4">
                <div class="input-group-prepend">
                  <span class="input-group-text">ห้อง</span>
                </div>
                <input type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">ผู้รับผิดชอบ</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="">
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">ย้อนกลับ</button>
        <button type="button" class="btn btn-primary">บันทึก</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-edit-info" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h4 class="modal-title">แก้ไขข้อมูลครุภัณฑ์</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
          <div class="card-body">
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">สถานะ</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">ประเภท</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="">
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">ย้อนกลับ</button>
        <button type="button" class="btn btn-primary">บันทึก</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>console.log('Hi!');</script>
@stop

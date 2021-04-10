@extends('layouts.adminlte')

@section('page_name')
    | Index
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-lg text-olive">ระบบจัดการบัญชีผู้ใช้ DSS WiFi</h3>
                        <p class="card-text text-sm-left" >สำหรับการสร้างบัญชีใช้งาน WiFi ให้กับผู้ใช้งานภายนอกที่เข้ามาใช้บริการของ วศ. 
                            ตามที่ได้รับการร้องขอจากหน่วยงานภายใน วศ. และอุปกรณ์ Mobile ของ วศ. ที่ลงทะเบียนด้วย MAC Address</p>
                        <a href="http://tucker.dss.local/itservices/" target ="_blank" class="btn btn-primary">คลิก</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-lg text-primary">ระบบจัดการองค์ความรู้ด้านไอที</h3>
                        <p class="card-text text-sm-left" >สำหรับการรวบรวมขั้นตอน และวิธีการปฏิบัติงานต่างๆ ที่นำมาใช้ในการปฏิบัติงาน
                            ของเจ้าหน้าที่ฝ่ายเทคโนโลยีสารสนเทศ เช่น การแก้ไขปัญหาจากการใช้งานระบบ การติดตั้งและปรับแต่งระบบปฏิบัติการ ฯลฯ
                        </p>
                        <a href="http://sean.dss.local/it-wiki/" target ="_blank" class="btn btn-primary">คลิก</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-lg text-lightblue ">ระบบ Network Monitoring (cacti)</h3>
                        <p class="card-text text-sm-left">สำหรับการตรวจสอบสถานะการทำงานของอุปกรณ์เครือข่าย และเครื่องคอมพิวเตอร์แม่ข่าย
                            ที่มีการติดตั้งใช้งานภายใน DSS Network ด้วยโปรแกรม cacti
                        </p>
                        <a href="http://watson.dss.local/cacti/" target="_blank" class="btn btn-primary">คลิก</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    
@endsection
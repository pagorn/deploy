@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                 
                    <p><strong>Name :</strong>{!! Auth::user()->name !!}</p>
                    <p><strong>Email :</strong>{!! Auth::user()->email !!}</p>
                    @if(Auth::user()->checkIsAdmin())
                       
                    @endif

                    @if(Auth::user()->isAdmin == '1')
                    <a href="./admin/department" class="btn btn-primary">สำหรับผู้ดูแลระบบ</a>
                    
                    @endif
                    
                    @if(Auth::user()->isAdmin == '0')
                    <a href="./admin/grade" class="btn btn-success">สำหรับนักศึกษา</a>
                    @endif

                    @if(Auth::user()->isAdmin == '2')
                    <a href="./reportapprove" class="btn btn-primary">รายงานผู้สำเร็จการศึกษา</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

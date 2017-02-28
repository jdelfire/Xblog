@extends('admin.layouts.app')
@section('title','IPs')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="widget widget-default">
                <div class="widget-header">
                    <h6><i class="fa fa-internet-explorer fa-fw"></i>IP</h6>
                </div>
                <div class="widget-body">
                    @if($ips->isEmpty())
                        <div style="text-align: center;"> -_- NO IP.</div>
                    @else
                        <table class="table table-hover table-striped table-bordered table-responsive"
                               style="overflow: auto">
                            <thead>
                            <tr>
                                <th>IP</th>
                                <th>评论数</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ips as $ip)
                                <tr>
                                    <td>{{ $ip->id }}</td>
                                    <td>{{ $ip->comments_count }}</td>
                                    <td>
                                        <button class="btn swal-dialog-target {{ $ip->blocked?' btn-danger':' btn-default' }}"
                                                data-dialog-msg="{{ $ip->blocked?'取消阻塞':'阻塞' }} IP {{ $ip->id }} ?{{ $ip->blocked?'':'阻塞后此IP将不能访问你的网站' }}"
                                                data-url="{{ route('ip.block',$ip->id) }}"
                                                title="{{ $ip->blocked?'Un Block':'Block' }}">
                                            <i class="fa {{ $ip->blocked?'fa-check':'fa-close' }} fa-fw"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if($ips->lastPage() > 1)
                            {{ $ips->links() }}
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

<div class="row">
    <div class="col-lg-12">

        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>赞助管理 </h5>
                <div class="ibox-tools">

                    分页: {{ $rows->perPage() }} / {{ $rows->lastPage() }} / {{ $rows->currentPage() }} 总计: {{ $rows->total() }}
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">

                    <form action="{{ route('sponsor') }}" method="get">
                        <div class="col-sm-4">

                            <select class="form-control m-b input-sm"  name="limit" >
                                @foreach($pageSizes as $val)
                                    <option value="{{$val}}" @if(request('limit') == $val) selected @endif> 每页{{$val}}条</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="col-sm-6">
                            <div class="input-group">
                                <input type="text" placeholder="昵称" class="input-sm form-control" name="keyword" value="{{ request('keyword') }}">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> 搜索</button>
                                </span>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="table-responsive">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>昵称</th>
                            <th>金额/元</th>
                            <th>支付方式</th>
                            <th>赞助时间</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rows as $row)
                            <tr>
                                <td>
                                    {{ $row->nickname }}
                                </td>
                                <td>
                                    {{ fen_to_yuan($row->amount) }}元
                                </td>
                                <td>{{$pay_modes[$row->pay_mode] }}</td>
                                <td>{{ $row->sponsor_date }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    @if(empty($rows->count()))

                        <h3 class="font-bold">找不到内容</h3>
                        <div class="error-desc">
                            当前页面没有内容，或搜索结果不存在, 请访问其它页面或更换关键词重新搜索
                        </div>

                    @endif

                    {!! $rows->links() !!}

                </div>

            </div>
        </div>
    </div>

</div>
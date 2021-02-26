@include('clientUser.header')

<main id="main">
    <section>
        <div class="row justify-content-center">
            <div class="col col-lg-8 mt-4">
                <h4>Proposal Management:</h4>
            </div>
        </div>

        <div class="row mt-4 justify-content-center">
            <div class="col col-xl-9">
                <section id="proposals-section">
                    <div class="row m-0 p-0">
                        <div class="col-6 bg-primary mb-3 pt-3">
                            <h5 class="text-light">Proposals</h5>
                        </div>
                        <div class="col-6 text-right bg-primary mb-3 pt-3"></div>
                        <div class="col-12">
                            <table id="proposalsTable" class="table table-striped table-bordered" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Proposed By</th>
                                        <th>Proposed Date</th>
                                        <th>Deadline</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proposals as $proposal)
                                    <tr>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#editModal">{{$proposal->title}}</a>
                                        </td>
                                        <td>{{$proposal->posted_by}}</td>
                                        <td>
                                            {{$proposal->starting_date}}
                                        </td>
                                        <td>
                                            {{$proposal->deadline_date}}
                                        </td>
                                        <td>{{$proposal->status}} </td>

                                        <div class="modal text-left fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            View Proposal
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                Title:<br />
                                                                <input class="form-control" type="text" name="title" disabled value="{{$proposal->title}}" /><br />
                                                                Subject:<br />
                                                                <input class="form-control" type="text" name="subject" disabled value="{{$proposal->subject}}" /><br />
                                                                Body:<br />
                                                                <input class="form-control" type="text" name="body" disabled value="{{$proposal->body}}" /><br />
                                                                Customer Name:<br />
                                                                <input class="form-control" type="text" name="customer_name" disabled value="{{$proposal->customer_name}}" /><br />
                                                                Starting
                                                                Date:<br />
                                                                <input class="form-control" type="date" name="starting_date" disabled value="{{$proposal->starting_date}}" /><br />
                                                                Deadline
                                                                Date:<br />
                                                                <input class="form-control" type="date" name="deadline_date" disabled value="{{$proposal->deadline_date}}" /><br />
                                                                Address:<br />
                                                                <input class="form-control" type="text" name="address" disabled value="{{$proposal->address}}" /><br />
                                                                City:<br />
                                                                <input class="form-control" type="text" name="city" disabled value="{{$proposal->city}}" /><br />
                                                                State:<br />
                                                                <input class="form-control" type="text" name="state" disabled value="{{$proposal->state}}" /><br />
                                                                Country:<br />
                                                                <input class="form-control" type="text" name="country" disabled value="{{$proposal->country}}" /><br />
                                                                Zip Code:<br />
                                                                <input class="form-control" type="text" name="zip_code" disabled value="{{$proposal->zip_code}}" /><br />
                                                                Email:<br />
                                                                <input class="form-control" type="text" name="email" disabled value="{{$proposal->email}}" /><br />
                                                                Phone:<br />
                                                                <input class="form-control" type="text" name="phone" disabled value="{{$proposal->phone}}" /><br />
                                                                Item:<br />
                                                                <input class="form-control" type="text" name="item" disabled value="{{$proposal->item}}" /><br />
                                                                Quantity:<br />
                                                                <input class="form-control" type="text" name="quantity" disabled value="{{$proposal->quantity}}" /><br />
                                                                Price Rate Pcs:<br />
                                                                <input class="form-control" type="text" name="rate" disabled value="{{$proposal->rate}}" /><br />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <td class="text-center">
                                            @if($proposal->posted_by == Session::get('username'))
                                            <form action="/proposallist/optup/<%=std.id%>" method="post">
                                            @csrf
                                                <button type="button" class="btn btn-warning">
                                                    Update
                                                </button>
                                            </form>
                                            @endif

                                            @if(strtolower($proposal->status)=='active')
                                            <a href="{{ route('proposal.optup', $proposal->id) }}" method="get">
                                                <button class="btn btn-danger text-light">Opt Up</button>
                                            </a>

                                            @elseif(strtolower($proposal->status)=='inactive')
                                            <a href="{{ route('proposal.approve', $proposal->id) }}" method="get">
                                                <button class="btn btn-success text-light">Approve</button>
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</main>

@include('clientUser.footer')
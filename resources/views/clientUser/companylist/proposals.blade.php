@include('clientUser.header')

<main id="main">
    <section>
        @include('clientUser.companylist.main')

        <div class="row mt-4 justify-content-center">
            <div class="col col-xl-9">
                <section id="proposals-section">
                    <div class="row m-0 p-0">
                        <div class="col-6 bg-primary mb-3 pt-3">
                            <h5 class="text-light">Proposals</h5>
                        </div>
                        <div class="col-6 text-right bg-primary mb-3 pt-3">
                            <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#add-proposal-modal">
                                Create a New Proposal
                            </button>

                            <!-- Modal -->
                            <div class="modal text-left fade" id="add-proposal-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form method="post">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    Add New Proposal
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <input class="form-control" type="text" name="title" placeholder="Title" /><br />
                                                        <input class="form-control" type="text" name="subject" placeholder="Subject" /><br />
                                                        <input class="form-control" type="text" name="body" placeholder="Body" /><br />
                                                        <input class="form-control" type="text" name="customer_name" placeholder="Customer" /><br />
                                                        <td>
                                                            Starting Date
                                                        </td>
                                                        <input class="form-control" type="date" name="starting_date" placeholder="Date" /><br />
                                                        <td>
                                                            Deadline Date
                                                        </td>
                                                        <input class="form-control" type="date" name="deadline_date" placeholder="Deadline Date" /><br />
                                                        <input class="form-control" type="text" name="address" placeholder="Address" /><br />
                                                        <input class="form-control" type="text" name="city" placeholder="City" /><br />
                                                        <input class="form-control" type="text" name="state" placeholder="State" /><br />
                                                        <input class="form-control" type="text" name="country" placeholder="Country" /><br />
                                                        <input class="form-control" type="text" name="zip_code" placeholder="Zip Code" /><br />
                                                        <input class="form-control" type="text" name="email" placeholder="Email" /><br />
                                                        <input class="form-control" type="text" name="phone" placeholder="Phone" /><br />
                                                        <input class="form-control" type="text" name="item" placeholder="Select Item" /><br />
                                                        <input class="form-control" type="text" name="quantity" placeholder="Quantity" /><br />
                                                        <input class="form-control" type="text" name="rate" placeholder="Price Rate Pcs" /><br />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <input type="submit" class="btn btn-success" name="submit" value="Create Proposal" />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

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
                                            <a href="#" data-toggle="modal" data-target="#editModal{{$proposal->id}}">{{$proposal->title}}</a>
                                        </td>
                                        <td>{{$proposal->posted_by}}</td>
                                        <td>
                                            {{$proposal->starting_date}}
                                        </td>
                                        <td>
                                            {{$proposal->deadline_date}}
                                        </td>
                                        <td>{{$proposal->status}} </td>

                                        <div class="modal text-left fade" id="editModal{{$proposal->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                            @if(strtolower($proposal->status)=='active')
                                            <a href="{{ route('companylist.proposal.optup', ['id'=> Session::get('company_id'), 'id2' => $proposal->id]) }}" method="get">
                                                <button class="btn btn-danger text-light">Opt Up</button>
                                            </a>

                                            @elseif(strtolower($proposal->status)=='inactive')
                                            <a href="{{ route('companylist.proposal.approve', ['id'=> Session::get('company_id'), 'id2' => $proposal->id]) }}" method="get">
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
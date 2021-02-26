@include('clientUser.header')

<main id="main">
    <section>
        <div class="row mt-4 justify-content-center">
            <div class="col col-xl-9">
                <section id="transactions-section">
                    <div class="row m-0 p-0">
                        <div class="col-6 bg-primary mb-3 pt-3">
                            <h5 class="text-light">Transactions</h5>
                        </div>
                        <div class="col-6 text-right bg-primary mb-3 pt-3">
                            <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#add-transactions-modal">
                                Add a New Transaction
                            </button>

                            <!-- Modal -->
                            @if($errors->any())

                            <div class="modal text-left fade" id="add-transactions-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
                            @else
                            <div class="modal text-left fade" id="add-transactions-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            @endif

                                <form method="post">
                                    @csrf
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    Add New Transaction
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <br>Type:</br>
                                                        <input class="form-control" type="text" name="type" placeholder="Type of transaction" />
                                                        <br>Company:</br>
                                                        <input class="form-control" type="text" name="company" placeholder="Company Name" />
                                                        <br>Description:</br>
                                                        <input class="form-control" type="text" name="description" placeholder="Description" />
                                                        <br>Amount:</br>
                                                        <input class="form-control" type="text" name="price" placeholder="Amount of Payment" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning" data-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <input type="submit" class="btn btn-success" name="submit" value="Create transaction" />
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                        </div>


                        <div class="col-12">
                            <table id="transactionsTable" class="table table-striped table-bordered" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Company</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Payment Date</th>
                                        <th>Request Date</th>
                                        <th>Requested By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{$transaction->type}}</td>
                                        <td>{{$transaction->company}}</td>
                                        <td>{{$transaction->description}}</td>
                                        <td>{{$transaction->price}}</td>
                                        @if($transaction->date!=null)
                                        <td>{{$transaction->date}}</td>
                                        @else
                                        <td>Pending</td>
                                        @endif
                                        <td>{{$transaction->creation_time}}</td>
                                        <td>{{$transaction->created_by}}</td>
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
@include('clientUser.header')

<main id="main">
    <section>
        <div class="row justify-content-center">
            <div class="col-12 col-xl-12">
                <div class="row justify-content-center">
                    <div class="col col-lg-8 mt-4">
                        <h4>Service History:</h4>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col col-xl-8 mt-4">
                        <table id="serviceTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Description</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Service</th>
                                    <th>Type</th>
                                    <th>Cost</th>
                                    <th>Company</th>
                                    <th>Address</th>
                                    <th>Contact No</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                <tr>
                                    <td>{{$service->service_history_id}}</td>
                                    <td>{{$service->description}}</td>
                                    <td>
                                        {{$service->start_date}}
                                    </td>
                                    <td>
                                        {{$service->end_date}}

                                    </td>
                                    <td>{{$service->name}}</td>
                                    <td>{{$service->type}}</td>
                                    <td>{{$service->cost}}</td>
                                    <td>{{$service->company_name}}</td>
                                    <td>{{$service->company_address}}</td>
                                    <td>{{$service->contact_number}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center" id="printBtnID">
                            <button class="btn w-50 btn-success" onclick="printFile('printBtnID','serviceTable')">
                                Download
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@include('clientUser.footer')
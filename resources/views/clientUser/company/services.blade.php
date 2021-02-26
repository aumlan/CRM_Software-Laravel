@include('clientUser.header')

<main id="main">
    <section>
        @include('clientUser.company.main')

        <div class="row mt-4 justify-content-center">
            <div class="col col-xl-9">
                <section id="proposals-section">
                    <div class="row m-0 p-0">
                        <div class="col-6 bg-primary mb-3 pt-3">
                            <h5 class="text-light">Services</h5>
                        </div>
                        <div class="col-6 text-right bg-primary mb-3 pt-3"></div>
                        <div class="col-12">
                            <table id="companyTable" class="table table-striped table-bordered" style="width: 100%">
                                <thead>
                                    <tr>
                                        <th>Service</th>
                                        <th>Type</th>
                                        <th>Cost</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)

                                    <tr>
                                        <td>{{$service->name}}</td>
                                        <td>{{$service->type}}</td>
                                        <td>{{$service->cost}}</td>
                                        <td>{{$service->status}}</td>
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
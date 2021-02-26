@include('clientUser.header')


<main id="main">

    <section>
        <div class="row justify-content-center mt-3">
            <div class="col col-xl-8">
              <div class="row justify-content-around">
                <div class="col-12 col-xl-3 bg-info text-white rounded"><br>
                  <h4 class="border-bottom border-light">Start a new chat</h4>
                  @foreach ($managers as $manager)
                    <a href="/chat/{{$manager->id}}" class="btn btn-primary btn-block btn-sm text-left border border-light">{{$manager->full_name}}</a><br>
                    @endforeach
                </div>
                <div class="col-12 col-xl-8 border rounded border-info pt-2">
                      <h1 class="pt-5 mt-4 pl-5 border-bottom border-info">Start a chat with your client....</h1>
                </div>
              </div>
            </div>
        </div>
    </section>
  </main>

@include('clientUser.footer')

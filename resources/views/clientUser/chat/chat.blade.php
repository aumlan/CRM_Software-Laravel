@include('clientUser.header')

<main id="main">

  <section>
    <div class="row justify-content-center mt-3">
        <div class="col col-xl-8">
          <div class="row justify-content-around">
            <div class="col-12 col-xl-3 bg-success text-white rounded"><br>
                <input type="text" id="searchBox" class="form-control bg-transparent text-white border border-light" placeholder="Search clients..."><br>
                <div id="clientSearchBox">
                </div>
                <div id="clientBox">
                    @foreach($managers as $manager)
                    <a href="/chat/{{ $manager['id']}}" class="btn btn-success btn-block btn-sm text-left border border-light">{{$manager['full_name']}}</a><br>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-xl-8 border rounded border-success pt-2">
              <div class="bg-success rounded text-white pt-3 text-right pr-4" style="margin-bottom: 20px">
                <label id="clientNameLabel1" value="1" for="">{{$manager_name}}</label>
              </div>
                      <div id="msgBoxSection1" style="height:270px; overflow:auto; padding:0px 15px 0px 15px">
                        @foreach($chats as $chat)
                        @if($chat['sent_from']=='Manager')
                        <br><br><span id="rcorners3" class="float-left" for="" >{{$chat['body']}}</span>
                        @endif
                        @if($chat['sent_from']=='Client')
                        <br><br><span id="rcorners4" for="" class="float-right">{{$chat['body']}}</span>
                        @endif
                        @endforeach
                      </div>
                    
              <br><textarea id="textMsg1" class="form-control mb-2" name="" id="" cols="90" style="height:40px; background:#f8f8f8;" placeholder="Send Message..."></textarea>
              <button id="sendMsgBtn1" class="btn btn-success btn-block">Send</button><br>
            </div>
          </div>
        </div>
    </div>
</section>
  </section>
</main>

@include('clientUser.footer')
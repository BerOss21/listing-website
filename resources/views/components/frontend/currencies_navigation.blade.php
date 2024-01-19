<form  action="{{route('currencies.change')}}" method="post">
    @csrf
    <select name="currency_code" class="user_btn" style="margin-left: 5px !important;background-color: lightgray !important;"  onchange="this.form.submit()">
        @foreach($currencies as $key=>$name)
        <option value="{{$key}}" @selected(session('currency_code',config('settings.site_default_currency'))==$key)>{{$key}}</option>
        @endforeach
    </select>
</form>
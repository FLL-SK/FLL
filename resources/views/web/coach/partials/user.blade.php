@role('user')
<div role="alert" class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button>
    Momentálne ste obyčajný užívateľ, pokiaľ chcete založiť tím alebo sa stať coachom, postupujte podľa pokynov nižšie.
</div>

<div class="jumbotron jumbotron-border">
    <h3>Ste coachom?</h3>
    <p>Na to aby ste mohli byť coachom musíte vyplniť zopár dodatočných informácií!</p>
    <a class="button large blue button-3d rounded" href="{{ route('coach/create') }}"><span>Som coach!</span></a>
</div>
@endrole
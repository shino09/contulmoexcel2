@extends('layouts.master')

@section('title')
    Importar Excel
@endsection

@section('head-content')
	<h1>
		<i class="fa fa-users"></i>
		EXCEL
		<small>Importar Personas al  sistema</small>
	</h1>
@endsection
	@section('main-content')

		
		



@endsection

@section('scripts')


	
		<script>
			window.onload = function() {
				var data ={

					"metadata":[
									{"name":"name","class":"test","label":"NAME","datatype":"string","editable":true},
									{"name":"firstname","label":"FIRSTNAME","datatype":"string","editable":true},
									{"name":"age","label":"AGE","datatype":"integer","editable":true},
									{"name":"height","label":"HEIGHT","datatype":"double(m,2)","editable":true},
									{"name":"country","label":"COUNTRY","datatype":"string","editable":true,"values":
										{
											"Europe":{"be":"Belgium","fr":"France","uk":"Great-Britain","nl":"Nederland"},
											"America":{"br":"Brazil","ca":"Canada","us":"USA"},
											"Africa":{"ng":"Nigeria","za":"South-Africa","zw":"Zimbabwe"}}
										},
									{"name":"email","label":"EMAIL","datatype":"email","editable":true},
									{"name":"freelance","label":"FREELANCE","datatype":"boolean","editable":true},
									{"name":"lastvisit","label":"LAST VISIT","datatype":"date","editable":true}
								],

"data":[res
]};
				// editableGrid = new EditableGrid("DemoGrid"); 
				// editableGrid.tableLoaded = function() { this.renderGrid("tablecontent", "testgrid"); };
				// var url = '{{ url("/import-excel" )}}';
				// editableGrid.load(data);

				editableGrid = new EditableGrid("ImportExel");
				editableGrid.load(data);
				editableGrid.renderGrid("tablecontent", "testgrid");
			} 
		</script>
		

								 <script src="{{ asset('js/editablegrid/editablegrid.js') }}"></script>
		<!-- [DO NOT DEPLOY] --> <script src="{{ asset('js/editablegrid/editablegrid_renderers.js') }}" ></script>
		<!-- [DO NOT DEPLOY] --> <script src="{{ asset('js/editablegrid/editablegrid_editors.js') }}" ></script>
		<!-- [DO NOT DEPLOY] --> <script src="{{ asset('js/editablegrid/editablegrid_validators.js') }}" ></script>
		<!-- [DO NOT DEPLOY] --> <script src="{{ asset('js/editablegrid/editablegrid_utils.js') }}" ></script>
		<!-- [DO NOT DEPLOY] --> <script src="{{ asset('js/editablegrid/editablegrid_charts.js') }}" ></script>

				<script>
			window.onload = function() {
				var data ={

					"metadata":[
									{"name":"name","class":"test","label":"NAME","datatype":"string","editable":true},
									{"name":"firstname","label":"FIRSTNAME","datatype":"string","editable":true},
									{"name":"age","label":"AGE","datatype":"integer","editable":true},
									{"name":"height","label":"HEIGHT","datatype":"double(m,2)","editable":true},
									{"name":"country","label":"COUNTRY","datatype":"string","editable":true,"values":
										{
											"Europe":{"be":"Belgium","fr":"France","uk":"Great-Britain","nl":"Nederland"},
											"America":{"br":"Brazil","ca":"Canada","us":"USA"},
											"Africa":{"ng":"Nigeria","za":"South-Africa","zw":"Zimbabwe"}}
										},
									{"name":"email","label":"EMAIL","datatype":"email","editable":true},
									{"name":"freelance","label":"FREELANCE","datatype":"boolean","editable":true},
									{"name":"lastvisit","label":"LAST VISIT","datatype":"date","editable":true}
								],

"data":[res
]};
				// editableGrid = new EditableGrid("DemoGrid"); 
				// editableGrid.tableLoaded = function() { this.renderGrid("tablecontent", "testgrid"); };
				// var url = '{{ url("/import-excel" )}}';
				// editableGrid.load(data);

				editableGrid = new EditableGrid("ImportExel");
				editableGrid.load(data);
				editableGrid.renderGrid("tablecontent", "testgrid");
			} 
		</script>
			@endsection
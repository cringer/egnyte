@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="medium-12 columns">
			<form method="POST" action="{{ route('vendor.store') }}" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">

				<div class="row">
				    <div class="medium-12 columns">
				    	<div class="alert callout" style="display: none;">
				    		<p><i class="fi-alert"></i> There are some errors in your form.</p>
				    	</div>
						<label>Vendor Name:
							<input type="text" id="name" name="name" v-model="form.name"></label>
						</label>
						<span class="form-error" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
					</div>
		        </div>
		        <div class="row">
					<div class="medium-12 columns">
	            		<button class="button" type="submit" value="submit" :disabled="form.errors.any()">Create</button>
	            	</div>
	        	</div>
	        </form>
	    </div>
	</div>
@endsection

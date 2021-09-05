<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nit'), 'has-success': fields.nit && fields.nit.valid }">
    <label for="nit" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.nit') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nit" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nit'), 'form-control-success': fields.nit && fields.nit.valid}" id="nit" name="nit" placeholder="{{ trans('admin.cliente.columns.nit') }}">
        <div v-if="errors.has('nit')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nit') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre'), 'has-success': fields.nombre && fields.nombre.valid }">
    <label for="nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre'), 'form-control-success': fields.nombre && fields.nombre.valid}" id="nombre" name="nombre" placeholder="{{ trans('admin.cliente.columns.nombre') }}">
        <div v-if="errors.has('nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre') }}</div>
    </div>
</div>



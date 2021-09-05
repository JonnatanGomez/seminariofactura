<div class="form-group row align-items-center" :class="{'has-danger': errors.has('idoperacion'), 'has-success': fields.idoperacion && fields.idoperacion.valid }">
    <label for="idoperacion" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.detalle.columns.idoperacion') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.idoperacion" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('idoperacion'), 'form-control-success': fields.idoperacion && fields.idoperacion.valid}" id="idoperacion" name="idoperacion" placeholder="{{ trans('admin.detalle.columns.idoperacion') }}">
        <div v-if="errors.has('idoperacion')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('idoperacion') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('idproducto'), 'has-success': fields.idproducto && fields.idproducto.valid }">
    <label for="idproducto" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.detalle.columns.idproducto') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.idproducto" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('idproducto'), 'form-control-success': fields.idproducto && fields.idproducto.valid}" id="idproducto" name="idproducto" placeholder="{{ trans('admin.detalle.columns.idproducto') }}">
        <div v-if="errors.has('idproducto')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('idproducto') }}</div>
    </div>
</div>



<div class="form-group row align-items-center" :class="{'has-danger': errors.has('Nombre'), 'has-success': fields.Nombre && fields.Nombre.valid }">
    <label for="Nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.consulta.columns.Nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.Nombre" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('Nombre'), 'form-control-success': fields.Nombre && fields.Nombre.valid}" id="Nombre" name="Nombre" placeholder="{{ trans('admin.consulta.columns.Nombre') }}">
        <div v-if="errors.has('Nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('Nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('Telefono'), 'has-success': fields.Telefono && fields.Telefono.valid }">
    <label for="Telefono" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.consulta.columns.Telefono') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.Telefono" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('Telefono'), 'form-control-success': fields.Telefono && fields.Telefono.valid}" id="Telefono" name="Telefono" placeholder="{{ trans('admin.consulta.columns.Telefono') }}">
        <div v-if="errors.has('Telefono')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('Telefono') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('edad'), 'has-success': fields.edad && fields.edad.valid }">
    <label for="edad" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.consulta.columns.edad') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.edad" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('edad'), 'form-control-success': fields.edad && fields.edad.valid}" id="edad" name="edad" placeholder="{{ trans('admin.consulta.columns.edad') }}">
        <div v-if="errors.has('edad')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('edad') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('Fechadecita'), 'has-success': fields.Fechadecita && fields.Fechadecita.valid }">
    <label for="Fechadecita" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.consulta.columns.Fechadecita') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.Fechadecita" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('Fechadecita'), 'form-control-success': fields.Fechadecita && fields.Fechadecita.valid}" id="Fechadecita" name="Fechadecita" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('Fechadecita')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('Fechadecita') }}</div>
    </div>
</div>



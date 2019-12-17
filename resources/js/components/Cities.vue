<template>
    <div>
        <!-- Button trigger modal -->
        <button v-if="localCities.length" @click.prevent="prepareCreate" type="button" class="btn btn-primary btn-sm">
            إنشاء مدينة
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle" v-text="modalTitle"></h5>
                        <button id="closeModal" type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form @submit.prevent="submit" @keydown="form.onKeydown($event)">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>إسم المدينة</label>
                                <input v-model="form.name" type="text" name="name"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                            </div>
                            <div class="form-group">
                                <label>المحافظة</label>
                                <select name="governorate_id" v-model="form.governorate_id" class="form-control">
                                    <option
                                        v-for="governorate in governorates"
                                        v-text="governorate.name"
                                        :value="governorate.id"
                                        :selected="selectedCity && selectedCity.governorate.id == governorate.id">
                                    </option>
                                </select>
                                <has-error :form="form" field="governorate_id"></has-error>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                            <button :disabled="form.busy" type="submit" class="btn btn-primary" v-text="modalSubmit"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <table v-if="governorates.length" class="table table-hover table-bordered table-center table-active">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">اسم المدينة</th>
                <th scope="col">المحاظة</th>
                <th scope="col">إعدادات</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(city, index) in localCities" :key="city.id">
                <td v-text="index+1"></td>
                <td v-text="city.name"></td>
                <td v-text="city.governorate.name"></td>
                <td>
                    <a href="#" class="btn btn-info btn-sm" @click.prevent="prepareEdit(city)">
                        <i class="fe fe-edit"></i>
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
        <div v-else class="alert alert-danger">
            لايوجد اى مدن حتى الان.
            <button @click.prevent="prepareCreate" type="button" class="btn btn-primary btn-sm">
                إنشاء مدينة
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['cities', 'governorates'],

        data () {
            return {
                localCities : this.cities,
                form: new Form({
                    name: null,
                    governorate_id: null,
                }),
                formType: 'create',
                modalTitle: null,
                modalSubmit: null,
                selectedCity: null,
            }
        },

        methods: {
            prepareEdit(city) {
                this.selectedCity = city;
                this.formType = 'edit';
                this.modalTitle = 'تعديل ' + city.name;
                this.form.name = city.name;
                this.modalSubmit = 'تعديل';
                $("#modal").modal('toggle');
            },

            prepareCreate() {
                this.formType = 'create';
                this.modalTitle = 'إنشاء مدينة جديدة';
                this.form.name = null;
                this.modalSubmit = 'تم';
                $("#modal").modal('toggle');
            },

            submit() {
                if(this.formType == 'create') {
                    this.create();
                } else {
                    this.update(this.selectedGovernorate);
                }
            },

            create() {
                this.form.post(this.url('cities'))
                .then(({data}) => {
                    this.localCities.unshift(data);
                    this.form.reset();
                    $("#modal").modal('toggle');
                });
            },

            update(city) {
                this.form.patch(this.url('cities/' + city.id))
                .then(({data}) => {
                    this.cities.splice(this.findByIndex(city), 1, data);
                    $("#modal").modal('toggle');
                });
            },

            // destroy(governorate) {
            //     axios.delete(this.url('governorates/' + governorate.id))
            //     .then(response => {
            //         this.governorates.splice(this.findByIndex(governorate), 1)
            //     });
            // },

            findByIndex(city) {
                return this.cities.indexOf(governorate);
            }
        }
    }
</script>

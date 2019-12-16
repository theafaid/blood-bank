<template>
    <div>
        <!-- Button trigger modal -->
        <button v-if="governorates.length" @click.prevent="prepareCreate" type="button" class="btn btn-primary btn-sm">
            إنشاء محافظة
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
                                <label>إسم المحافظة</label>
                                <input v-model="form.name" type="text" name="name"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
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
                <th scope="col">اسم المحافظة</th>
                <th scope="col">إعدادات</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(governorate, index) in governorates" :key="governorate.id">
                <td v-text="index+1"></td>
                <td v-text="governorate.name"></td>
                <td>
                    <a href="#" class="btn btn-info btn-sm" @click.prevent="prepareEdit(governorate)">
                        <i class="fe fe-edit"></i>
                    </a>
                    <a href="#" @click.prevent="destroy(governorate)" class="btn btn-danger btn-sm">
                        <i class="fe fe-trash"></i>
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
        <div v-else class="alert alert-danger">
            لايوجد اى محافظات حتى الان.
            <button v-if="governorates.length" @click.prevent="prepareCreate" type="button" class="btn btn-primary btn-sm">
                إنشاء محافظة
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['data'],

        data () {
            return {
                governorates : this.data,
                form: new Form({
                    name: null,
                }),
                modalTitle: null,
                modalSubmit: null,
                selectedGovernorate: null,
            }
        },

        methods: {
            prepareEdit(governorate) {
                this.selectedGovernorate = governorate;
                this.formType = 'edit';
                this.modalTitle = 'تعديل ' + governorate.name;
                this.form.name = governorate.name;
                this.modalSubmit = 'تعديل';
                $("#modal").modal('toggle');
            },

            prepareCreate() {
                this.formType = 'create';
                this.modalTitle = 'إنشاء محافظة جديدة';
                this.form.name = null;
                this.modalSubmit = 'تم';
                $("#modal").modal('toggle');
            },


            prepareDelete() {

            },

            submit() {
                if(this.formType == 'create') {
                    this.create();
                } else {
                    this.update(this.selectedGovernorate);
                }
            },

            create() {
                this.form.post(this.url('governorates'))
                .then(({data}) => {
                    this.governorates.unshift(data);
                    this.form.reset();
                    $("#modal").modal('toggle');
                });
            },

            update(governorate) {
                this.form.patch(this.url('governorates/' + governorate.id))
                .then(({data}) => {
                    this.governorates.splice(this.findByIndex(governorate), 1, data)
                    $("#modal").modal('toggle');
                });
            },

            destroy(governorate) {
                axios.delete(this.url('governorates/' + governorate.id))
                .then(response => {
                    this.governorates.splice(this.findByIndex(governorate), 1)
                });
            },

            findByIndex(governorate) {
                return this.governorates.indexOf(governorate);
            }
        }
    }
</script>

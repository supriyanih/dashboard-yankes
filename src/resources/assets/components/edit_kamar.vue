<template>
    <div class="row">
        <div class="col-lg-12">
            <b-card header="Edit Jumlah Tempat Tidur" header-tag="h4" class="bg-success-card">
                <div class="row">
                    <div class="col-lg-7 col-12 mb-3">
                        <vue-form class="form-horizontal form-validation" :state="formstate" @submit.prevent="onSubmit">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <validate tag="div">
                                        <label for="tanggal">Tanggal</label>
                                        <input name="tanggal" type="date" required autofocus placeholder="Tanggal" class="form-control" v-model="model.tanggal" />
                                        <field-messages name="tanggal" show="$invalid && $submitted" class="text-danger">
                                            <div slot="required">Tanggal Harus di isi</div>
                                        </field-messages>
                                    </validate>
                                </div>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <validate tag="div">
                                        <label for="city_id"> Kota</label>
                                        <select v-model="model.city_id" name="city_id" required autofocus class="form-control">
                                          <option disabled value="">Please select one</option>
                                          <option v-for="datacity in city" :value="datacity.id">{{datacity.name}}</option>
                                        </select>
                                        <field-messages name="city_id" show="$invalid && $submitted" class="text-danger">
                                            <div slot="required">Kab / Kota Harus diisi</div>
                                        </field-messages>
                                    </validate>
                                </div>
                            </div>
                           <div class="col-lg-12">
                                <div class="form-group">
                                    <validate tag="div">
                                        <label for="count">Jumlah Tempat Tidur</label>
                                        <input v-model="model.count" name="count" type="number" required autofocus placeholder="Jumlah" class="form-control" />
                                        <field-messages name="count" show="$invalid && $submitted" class="text-danger">
                                            <div slot="required">Jumlah Harus diisi</div>
                                        </field-messages>
                                    </validate>
                                </div>
                            </div>

                            <div class="col-md-offset-4 col-md-8 m-t-25">
                                <button type="submit" class="btn btn-primary">Submit
                                </button>
                                <button type="reset" class="btn btn-effect-ripple btn-secondary  reset_btn1" @click="form_reset">
                                    Reset
                                </button>
                                <button type="reset" class="btn btn-danger" @click="back">
                                    Back
                                </button>
                            </div>
                        </vue-form>
                    </div>
                    <div class="col-lg-5 col-12 mt-4">
                    </div>
                </div>
            </b-card>
        </div>
    </div>
</template>
<script>
import Vue from 'vue';
require("checkbox.css/dist/css/checkbox.min.css");
require("radiobox.css/dist/css/radiobox.min.css");
import miniToastr from 'mini-toastr';
miniToastr.init();
import VueForm from "vue-form";
import options from "../validations/validations.js";
Vue.use(VueForm, options);
export default {
    name: "edit_epormas",
    data() {
        return {
            category: [],
            city: [],
            formstate: {},
            model: {
                tanggal: "",
                city_id: "",
                count: ""
            },
            old_file: ""
        }
    },
    methods: {
        onSubmit: function() {
            if (this.formstate.$invalid) {
                return;
            } else {
              var id = this.$route.params.id;
              axios.put("/update/kamar/"+id, {
                  tanggal: this.model.tanggal,
                  city_id: this.model.city_id,
                  count: this.model.count
              })
              .then(response => {
                  if(response.data.type == 'success'){
                    miniToastr.success(response.data.message, response.data.title)
                  }
                  else{
                    miniToastr.error(response.data.message, response.data.title)
                  }
                },window.location = '#/kamar')
              .catch((error) => miniToastr.error(error, "Error"));
            }
        },
        form_reset() {
            var id = this.$route.params.id;
            axios.get("/api/kamar/"+id+"/edit").then(response => {
                    this.model = {
                        tanggal: response.data.tanggal,
                        city_id: response.data.result.city_id,
                        count: response.data.result.count
                    }
            })
            .catch(function(error) {miniToastr.error(error, "Error")});
        },
        back() {
            window.location = '#/kamar';
        }
    },
    mounted: function() {
        var id = this.$route.params.id;
        axios.get("/api/kamar/"+id+"/edit").then(response => {
                this.city = response.data.city;
                this.model = {
                    tanggal: response.data.tanggal,
                    city_id: response.data.result.city_id,
                    count: response.data.result.count
                }
        })
        .catch(function(error) {miniToastr.error(error, "Error")});
    },
    destroyed: function() {

    }
}
</script>
<style scoped>
.dropzone_wrapper {
    width: 100%;
    height: 300px;
}
</style>

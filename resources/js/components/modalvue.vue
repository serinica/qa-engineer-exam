<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div>
                    <b-alert v-if="success"
                        :show="dismissCountDown"
                        dismissible
                        variant="success"
                        @dismissed="dismissCountDown=0"
                        @dismiss-count-down="countDownChanged"
                        ><h4>Product Updated!</h4>
                    </b-alert>
                </div>
                <form @submit.prevent="submitLastForm">
                    <div class="row mb-2">
                        <div class="col">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" v-model.trim="$v.name.$model" :class="{'is-invalid':$v.name.$error && !success, 'is-valid':!$v.name.$invalid }" id="name" placeholder="Product name">
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">
                                <span v-if="!$v.name.required && !success">Product name is required</span>
                            </div>
                        </div>
                        <div class="col">
                            <label for="category">Category</label>
                            <select class="form-control"  v-model.trim="$v.category.$model" :class="{'is-invalid':$v.category.$error && !success, 'is-valid':!$v.category.$invalid}" id="category" >
                            <option disabled selected>-Product Category-</option>
                            <option v-for="(product) in products" :key="product.id">{{product}}</option>
                            </select>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback">
                                <span v-if="!$v.category.required && !success">Select a product category</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control"  v-model.trim="$v.description.$model" :class="{'is-invalid':$v.description.$error && !success, 'is-valid':!$v.description.$invalid}" id="description" rows="3" placeholder="Describe the product.." maxlength="250"></textarea>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">
                            <span v-if="!$v.description.required && !success">Description cannot be empty</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image">Upload an image</label>
                        <input type="file"  v-on:change="onFileChange" class="form-control-file" id="image" accept="image/*" :class="{'is-invalid':!image && !success, 'is-valid':image !==''}" multiple>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">
                            <span v-if="!image && !success">No image uploaded</span>
                        </div>
                    </div>
                        <div v-if="image" class="form-group">
                                <img :src="image" />
                        </div>
                    <div class="form-group">
                        <b-col class="my-1" sm="5">
                            <b-row sm="5">
                                <b-form-datepicker v-model="date" :class="{'is-invalid':!date && !success, 'is-valid':date}"></b-form-datepicker>
                            </b-row>
                        </b-col>
                        <b-col class="my-1" sm="5">
                            <b-row sm="3">
                                <b-form-timepicker v-model="time" locale="en" :class="{'is-invalid':!time && !success, 'is-valid':time}"></b-form-timepicker>
                            </b-row>
                        </b-col>
                        <b-col class="invalid-feedback"> <span v-if="!date || !time">Date and Time is required</span></b-col>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form >
            </div>
        </div>
    </div>
</template>
<script>
import { required, minLength, maxLength, between } from 'vuelidate/lib/validators'
    export default {
        props: ["put"],
        name:'App',
        data(){
            return{
                products: {},
                id: this.put.id,
                name: this.put.name,
                category: this.put.category,
                description: this.put.description,
                date: this.put.datetime.split(" ")[0],
                time: this.put.datetime.split(" ")[1],
                datetime: '',
                image: '',
                success:'',
                dismissSecs: 5,
                dismissCountDown: 0
            }
        },
        validations: {
            name:{
                required
            },
            category:{
                required
            },
            description:{
                required
            }
        },
         mounted() {
                this.getResults();
        },

        methods: {
        // Our method to GET results from a Laravel endpoint
             submitLastForm(){
                this.$v.$touch()
                if(!this.$v.$invalid){
                    if(this.date!=='' && this.time!=='' && this.image!==''){
                        console.log(this.put.id);
                        this.updateProduct();
                    }
                }
             },
            updateProduct(){
                axios.put('product',{
                    id: this.id,
                    name : this.name,
                    category : this.category,
                    description : this.description,
                    datetime : this.date+ " " +this.time,
                }).then(res=>{
                        this.success = res.data,
                        this.showAlert()
                    }) .catch(error => {
                            console.log(error);
                    });
            },
            getResults() {
                axios.get('api/category')
                    .then(response => {
                        this.products = response.data;
                    });
            },
            onFileChange(e) {
                var files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                var image = new Image();
                var reader = new FileReader();
                var vm = this;

                reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            countDownChanged(dismissCountDown) {
                this.dismissCountDown = dismissCountDown
            },
            showAlert() {
                this.dismissCountDown = this.dismissSecs
            },
        }
    }
</script>

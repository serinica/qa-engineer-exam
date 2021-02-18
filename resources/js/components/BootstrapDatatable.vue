<template>

  <div class="container mt-2 ">
    <h2 class="row justify-content ml-2 mb-3">Products</h2>
      <b-container fluid>
            <b-row class="mb-3">
                <b-col lg="6" class="my-1">
                    <b-form-group
                    label="Filter"
                    label-for="filter-input"
                    label-cols-sm="1"
                    label-align-sm="left"
                    label-size="sm"
                    class="mb-0"
                    >
                    <b-input-group size="sm">
                        <b-form-input
                        id="filter-input"
                        v-model="filter"
                        type="search"
                        placeholder="Type to Search"
                        ></b-form-input>

                        <b-input-group-append>
                        <b-button :disabled="!filter" @click="filter = ''">Clear</b-button>
                        </b-input-group-append>
                    </b-input-group>
                    </b-form-group>
                </b-col>

                <b-col lg="6" class="my-1">
                    <b-form-group
                    v-model="sortDirection"
                    label="Filter On"
                    description="Leave all unchecked to filter on all data"
                    label-cols-sm="3"
                    label-align-sm="right"
                    label-size="sm"
                    class="mb-0"
                    v-slot="{ ariaDescribedby }"
                    >
                    <b-form-checkbox-group
                        v-model="filterOn"
                        :aria-describedby="ariaDescribedby"
                        class="mt-1"
                    >
                        <b-form-checkbox value="name">Name</b-form-checkbox>
                        <b-form-checkbox value="category">Category</b-form-checkbox>
                        <b-form-checkbox value="description">Description</b-form-checkbox>
                    </b-form-checkbox-group>
                    </b-form-group>
                </b-col>


            </b-row>
            <b-row>
                <b-col>
                    <b-table
                    striped
                    hover
                    outlined
                    stacked="md"
                    small
                    :items="product.data"
                    :current-page="currentPage"
                    :per-page="perPage"
                    :filter="filter"
                    :filter-included-fields="filterOn"
                    :fields="fields"
                    @filtered="onFiltered"
                    >
                    <template #cell(actions)="items">
                        <b-button class="mb-1" size="sm" v-b-modal.my-modal variant="primary" @click="editProduct(items.item)">Edit</b-button>
                        <b-button size="sm" variant="danger" @click="deleteItem(items.item.id)">Delete</b-button>
                    </template>

                </b-table>
                    <b-col sm="1" md="3" class="my-1">
                        <b-form-group
                        label="Per page"
                        label-for="per-page-select"
                        label-cols-sm="8"
                        label-cols-md="6"
                        label-cols-lg="4"
                        label-align-sm="left"
                        label-size="sm"
                        class="mb-0"
                        >
                        <b-form-select
                            id="per-page-select"
                            v-model="perPage"
                            :options="pageOptions"
                            size="sm"
                        ></b-form-select>
                        </b-form-group>
                    </b-col>
                <b-col sm="3" md="3" class="my-1">
                    <b-pagination
                    v-model="currentPage"
                    :total-rows="totalRows"
                    :per-page="perPage"
                    align="fill"
                    size="x"
                    class="my-0"
                    ></b-pagination>
                </b-col>
            </b-col>
        </b-row>
        <b-modal  no-close-on-backdrop size="lg" id="my-modal" title="Edit Product"><template #modal-footer="{ close }">
            <b-button size="sm" variant="danger" @click="close(closeModal())">Close
      </b-button>

        </template>
            <edit-modal-vue :put="put" /></b-modal>
    </b-container>

  </div>
</template>

<script>
export default {
   //name:"App",
  data() {
    return {
        fields:[
            {key: 'id', label: 'ID'},
            {key: 'name', label: 'Name', sortable: true, sortDirection: 'desc'},
            {key: 'category', label: 'Category', sortable: true},
            {key: 'description', label: 'Description'},
            {key: 'datetime', label: 'Date/Time'},
            {key: 'actions', label: 'Actions'}
            ],
        product: '',
        totalRows: 1,
        pageOptions: [5, 10, 15, { value: 100, text: "Show a lot" }],
        sortBy: '',
        sortDesc: false,
        sortDirection: 'asc',
        filter: null,
        filterOn: [],
        perPage: 5,
        currentPage: 1,
        put: {},
        infoModal: {
           'id': 'info-modal',
           'name':'',
           'content':''
        }
        };
    },
    mounted() {
            this.getResults();
            this.totalRows = this.product.length;
        },
    methods: {
        closeModal() {
            this.getResults();
        },
        deleteItem(id){
             axios.delete('product/'+ id)
                .then(res => {
                    this.getResults();
                }) .catch(error => {
                    console.log(error.response)
                });
        },
    // Our method to GET results from a Laravel endpoint
        getResults() {
            axios.get('api/product')
                .then(res => {
                    this.totalRows = res.data.length;
                    this.product = res;
                });
        },
        onFiltered(filteredItems) {
            // Trigger pagination to update the number of buttons/pages due to filtering
            this.totalRows = filteredItems.length
            this.currentPage = 1
        },
        editProduct(data){
           this.put= data;
        }
    }
};
</script>

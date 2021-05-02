<template>
    <div>
        <div class="modal fade" id="create-brand_id" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <i class="far fa-edit"></i> Create Brand with Vue
                        </h4>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- /.modal-header -->
                    <!-- form start -->
                    <form v-on:submit.prevent="createBrand">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="brand_full_name"
                                    >ชื่อเต็มยี่ห้อผลิตภัณฑ์</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="brand_full_name"
                                    placeholder="brand_full_name"
                                    required
                                    v-model="brand.brand_full_name"
                                />
                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="brand_abbr_name"
                                    >ชื่อย่อยี่ห้อผลิตภัณฑ์</label
                                >
                                <input
                                    type="text"
                                    class="form-control"
                                    id="brand_abbr_name"
                                    placeholder="brand_abbr_name"
                                    v-model="brand.brand_abbr_name"
                                />
                            </div>
                        </div>
                        <!-- /.modal-body -->
                        <div class="modal-footer justify-content-between">
                            <button
                                type="button"
                                class="btn btn-default btn-sm"
                                data-dismiss="modal"
                            >
                                Close
                            </button>
                            <button
                                type="submit"
                                class="btn btn-primary btn-sm"
                            >
                                Save
                            </button>
                        </div>
                        <!-- /.modal-footer -->
                    </form>
                    <!-- end start -->
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            brands: [],
            brand: {
                brand_full_name: "",
                brand_abbr_name: "",
            },
        };
    },
    mounted() {
        const frm = document.getElementById("create-brand_id");
    },
    methods: {
        createBrand() {
            console.log("addBrand");
        },
    },
};
</script>

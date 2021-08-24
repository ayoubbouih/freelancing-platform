<template>
    <div class="row pb-0 poste">
        <div class="col-12 position-relative">
            <button type=button 
                class="btn btn-outline-danger float-right py-0 px-1"
                v-on:click="$emit('remove')">
                <span class="p-2">X</span>
            </button>
        </div>
        <div class="col-12 col-lg-6">
            <div class="form-group">
                <h5>l'intitulé du poste <i class="fa fa-info-circle" title="Up to 5 skills that best describe your project"></i></h5>
                <input type="text" class="form-control" name="poste_intitule[]" placeholder="ex: developpeur web"/>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="form-group">
                <h5>votre budget</h5>
                <div class="row">
                    <div class="col-6">
                        <div class="input-group">
                            <input class="form-control" name="poste_min[]" type="number" placeholder="Minimum">
                            <div class="input-group-append">
                                <i class="input-group-text">USD</i>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group">
                            <input class="form-control" name="poste_max[]" type="number" placeholder="Maximum">
                            <div class="input-group-append">
                                <i class="input-group-text">USD</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {}
</script>
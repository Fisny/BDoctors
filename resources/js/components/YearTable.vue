<template>
    <table class="table table-sm table-hover">
    <thead>
        <tr>
        <th scope="col">Anno</th>
        <th scope="col">N° Recensioni</th>
        </tr>
    </thead>
    <tbody>
        <!-- <tr>
        <td>2021</td>
        <td>(37)</td>
        </tr>
        <tr>
        <td>2020</td>
        <td>(60)</td>
        </tr>
        <tr>
        <td>2019</td>
        <td>(24)</td>
        </tr> -->
        <tr v-for="(year, yearKey) in yearsarray" v-bind:key="yearKey">
            <td>{{year}}</td>
            <td>{{reviewsPerYear[yearKey]}}</td>
        </tr>
    </tbody>
    </table>
</template>

<script>
export default {
    mounted(){
        this.pushMonthlyReviews();
    },
    props:{
        yearsarray: {
            type:Array,
        },
        loggeduserid: Number,
    },
    data(){
        return{
            yearsArray: this.yearsarray,
            loggedId: this.loggeduserid,
            reviewsPerYear:[],
            totalReviews:[],
            userReviews:[],
        }
    },
    methods:{
        pushMonthlyReviews(){
            this.getReviews();
            this.yearsArray.forEach((year, yearIndex)=>{
                this.totalReviews.forEach(review=>{
                    if(parseInt(review.created_at.substring(0,4)) == year){
                        this.reviewsPerYear[yearIndex]++;
                    }
                });
            });
        },
        getReviews() {
            axios.get("http://127.0.0.1:8000/api/reviews").then((response) => {
                this.totalReviews = response.data;
            });
            this.totalReviews.forEach(review=>{
                if(review.user_id == this.loggedId){
                    this.userReviews.push(review);
                }
            });
        },
    }
}
</script>

<style lang="scss" scoped>

</style>
<script>
import Hello from './Hello.vue'
export default {
    components: {
        'hello': Hello
    },
    data() {
        return {
            message: "hello laravel from App component"
        }
    },
    mounted() {
        console.log("Component mounted.");
    },
};
</script>

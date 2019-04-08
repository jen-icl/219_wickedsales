import React, {Component} from 'react';

class ProductCarousel extends Component {
    componentDidMount(){
        const config = {
            numVisible: 1,
            indicators: true,
        }
        M.Carousel.init(this.carousel, config);
    }

    render(){
        const item = this.props.images.map((img) => {
            return (
                <a key={img} className="carousel-item" href="#">
                    <img src={`/dist/${img}`} alt="Product Image"/>
                </a>
            );
        })
        return (
            <div ref={(element) => this.carousel = element} className="carousel col s12 m4">
                {item}
            </div>
        );
    }
}

export default ProductCarousel;

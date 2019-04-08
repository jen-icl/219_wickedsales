import React, {Component} from 'react';

class ProductCarousel extends Component {
    componentDidMount(){
        console.log('carousel div', this.carousel)
        M.Carousel.init(this.carousel);
    }

    render(){
        console.log('props carousel', this.props)
        const item = this.props.images.map((img) => {
            return (
                <a key={img} className="carousel-item" href="#">
                    <img src={`/dist/${img}`} alt="Product Image"/>
                </a>
            );
        })
        return (
            <div ref={(element) => this.carousel = element} className="carousel">
                {item}
            </div>
        );
    }
}

export default ProductCarousel;

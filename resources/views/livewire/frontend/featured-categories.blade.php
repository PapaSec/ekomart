Featured Categories
            
            
                
                    
                        
                    
                
                
                    
                        
                    
                
            
        

        
        
            @forelse($categories as $category)
                
                    
                    
                    
                        @if($category->image)
                            
                        @else
                            
                                No Image
                            
                        @endif
                    

                    
                    
                        
                            {{ $category->name }}
                        
                        
                            {{ $category->products_count ?? 0 }} ITEMS
                        
                    
                
            @empty
                No categories found.
            @endforelse
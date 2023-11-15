class Coffee:
    def __init__(self, coffee_type):
        self.coffee_type = coffee_type

    def grind_coffee(self):
        pass

    def make_coffee(self):
        pass

    def pour_into_cup(self):
        pass

class Espresso(Coffee):
    def grind_coffee(self):
        print(f"Sure thing! Grinding up those premium {self.coffee_type} coffee beans for you.")

    def make_coffee(self):
        print(f"Alright, let's brew a strong cup of {self.coffee_type} for that extra kick!")

    def pour_into_cup(self):
        print(f"There you go! Pouring that rich {self.coffee_type} goodness into your cup.")

class Cappuccino(Coffee):
    def grind_coffee(self):
        print(f"Grinding up those fine {self.coffee_type} coffee beans for a perfect cup.")

    def make_coffee(self):
        print(f"Time to froth and prepare a delightful {self.coffee_type} just the way you like it.")

    def pour_into_cup(self):
        print(f"Voilà! Pouring that velvety {self.coffee_type} into your cup.")

class Americano(Coffee):
    def grind_coffee(self):
        print(f"Preparing to grind those medium-roast {self.coffee_type} coffee beans for a smooth blend.")

    def make_coffee(self):
        print(f"Blending away for a smooth cup of {self.coffee_type}. Enjoy!")

    def pour_into_cup(self):
        print(f"Carefully pouring that mellow {self.coffee_type} into your cup. Ready to savor!")

class CoffeeFactory:
    def create_coffee(self, coffee_type):
        if coffee_type.lower() == "espresso":
            return Espresso(coffee_type)
        elif coffee_type.lower() == "cappuccino":
            return Cappuccino(coffee_type)
        elif coffee_type.lower() == "americano":
            return Americano(coffee_type)
        else:
            raise ValueError("Apologies, we don't have that coffee type available right now.")

def order_coffee():
    coffee_factory = CoffeeFactory()

    while True:
        print("Hello there! Welcome to our Coffee Shop!")
        print("Please choose a coffee type: espresso, cappuccino, americano (or type 'exit' to leave)")
        user_input = input(">> ")

        if user_input.lower() == "exit":
            print("Thank you for stopping by! Have a wonderful day!")
            break

        try:
            coffee = coffee_factory.create_coffee(user_input)
            coffee.grind_coffee()
            coffee.make_coffee()
            coffee.pour_into_cup()
        except ValueError as e:
            print(f"Oops! {e} Please choose a coffee type from our menu.")

if __name__ == "__main__":
    order_coffee()
